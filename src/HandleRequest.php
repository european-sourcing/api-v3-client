<?php

namespace EasyWeb\FrontBundle\Apiv3;

use Doctrine\ORM\EntityManager;
use EasyWeb\FrontBundle\ElasticSearch\Model\Search;
use EasyWeb\FrontBundle\Provider\BrandProvider;
use EasyWeb\FrontBundle\Provider\SiteProvider;
use EasyWeb\FrontBundle\Services\FilterRangePrice;
use Lexik\Bundle\CurrencyBundle\Currency\Converter;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;

class HandleRequest
{
    /**
     * @var Converter
     */
    private $lexikConverter;

    /**
     * @var ParameterBagInterface
     */
    private $parameterBag;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var BrandProvider
     */
    private $brandProvider;

    /**
     * @var SiteProvider
     */
    private $siteProvider;

    /**
     * @var FilterRangePrice
     */
    private $filterRangePrice;

    /**
     * @param Converter $lexikConverter
     * @param ParameterBagInterface $parameterBag
     */
    public function __construct(
        Converter $lexikConverter,
        ParameterBagInterface $parameterBag,
        EntityManager $em,
        BrandProvider $brandProvider,
        SiteProvider $siteProvider,
        FilterRangePrice $filerRangePrice
    ) {
        $this->lexikConverter = $lexikConverter;
        $this->parameterBag = $parameterBag;
        $this->em = $em;
        $this->brandProvider = $brandProvider;
        $this->siteProvider = $siteProvider;
        $this->filterRangePrice = $filerRangePrice;
    }

    /**
     * @param Search $searchModel
     * @param Request $request
     *
     * @return Search
     */
    public function handle(Search $searchModel, Request $request, $currency)
    {
        $searchModel->setQuery( $request->get('query') );
        $searchModel->setBrandId( $request->get('brand') );
        $searchModel->setHasStock( $request->get('stock') );
        $searchModel->setIsNew( $request->get('isnew') );
        $searchModel->setCategory( $request->get('id_category') );
        $searchModel->setIsSimple(true);
        $searchModel->setMewSearch(true);

        // Price min
        $priceMin = $request->get('price_min');
        if (null !== $priceMin) {
            $priceMin = str_replace(',', '.', $priceMin);
            $priceMin = round($this->lexikConverter->convert($priceMin, 'EUR', false, $currency), 2);
            $searchModel->setMinPrice($request->get('price_min'));
        }

        // Price max
        $priceMax = $request->get('price_max');
        if (null !== $priceMax) {
            $priceMax = str_replace(',', '.', $priceMax);
            $priceMax = round($this->lexikConverter->convert($priceMax, 'EUR', false, $currency), 2);
            $searchModel->setMaxPrice($request->get('price_max'));
        }

        if ( (!empty($priceMin)) || (!empty($priceMax)) ) {
            $inRangeProductIds = $this->filterRangePrice->getIdsInRangePrice(
                $this->siteProvider->get(),
                '',
                $priceMin,
                $priceMax
            );
            if (empty($inRangeProductIds)) {
                $inRangeProductIds = array(-1);
            }

            $searchModel->setIds(array_keys($inRangeProductIds));
        }

        // Brand
        $slugBrand = $request->get('slug_brand');
        $brand = null;
        if (null !== $slugBrand) {
            $brand = $this->brandProvider->get($slugBrand);
            $searchModel->setBrandId($brand['id']);
        }

        // categories
        $category = $request->get('id_category');
        if (null !== $category) {
            $searchModel->setCategory($category);

        } elseif (null !== $request->get('category')) {
            $categories = $request->get('category');
            $category = reset($categories);
            $searchModel->setCategory($category);
        }
    }
}
