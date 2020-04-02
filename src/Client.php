<?php

namespace Medialeads\Apiv3Client;

use Medialeads\Apiv3Client\Model\Variant;
use Medialeads\Apiv3Client\Normalizer\Aggregation\AggregationNormalizer;
use Medialeads\Apiv3Client\Normalizer\Aggregation\AttributeNormalizer;
use Medialeads\Apiv3Client\Normalizer\Aggregation\BrandNormalizer;
use Medialeads\Apiv3Client\Normalizer\Aggregation\CategoriesNormalizer;
use Medialeads\Apiv3Client\Normalizer\Aggregation\CountryNormalizer;
use Medialeads\Apiv3Client\Normalizer\Aggregation\MarkingNormalizer;
use Medialeads\Apiv3Client\Normalizer\Aggregation\SupplierProfileNormalizer;
use Medialeads\Apiv3Client\Normalizer\BrandsNormalizer;
use Medialeads\Apiv3Client\Normalizer\Marking\VariantMarkingsNormalizer;
use Medialeads\Apiv3Client\Normalizer\ProductsNormalizer;
use Medialeads\Apiv3Client\Response\SearchResponse;

class Client
{
    /**
     * @var \GuzzleHttp\Client
     */
    private $guzzle;

    /**
     * @var String
     */
    private $apiUrl;

    /**
     * @var string
     */
    private $token;

    /**
     * @param \GuzzleHttp\Client $guzzle
     * @param $apiUrl
     * @param $token
     */
    public function __construct(
        \GuzzleHttp\Client $guzzle,
        $apiUrl,
        $token
    ) {
        $this->guzzle = $guzzle;
        $this->apiUrl = $apiUrl;
        $this->token = $token;
    }

    /**
     * @param QueryHandler $queryHandler
     *
     * @return SearchResponse
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function search(QueryHandler $queryHandler)
    {
        $body = \json_encode(
            $queryHandler->export()
        );

        $response = $this->guzzle->request('POST', $this->apiUrl.'/search', [
            'body' => $body,
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        $results = \json_decode($response->getBody(), true);

        $productsNormalizer = new ProductsNormalizer();
        $products = $productsNormalizer->denormalize($results['products']);

        $searchResponse = new SearchResponse();
        $searchResponse->setProducts($products);
        $searchResponse->setTotalProducts($results['pagination']['total_items']);

        if (!empty($results['aggregations'])) {
            foreach ($results['aggregations'] as $aggregation) {
                $objectNormalizerName = null;

                if ($aggregation['name'] === 'categories') {
                    $normalizer = new CategoriesNormalizer();
                    $searchResponse->addAggregation(
                        $normalizer->denormalize($aggregation['rows'])
                    );
                }

                switch($aggregation['name']) {
                    case 'marking':
                        $objectNormalizerName = MarkingNormalizer::class;
                        break;

                    case 'brands':
                        $objectNormalizerName = BrandNormalizer::class;
                        break;

                    case 'country':
                        $objectNormalizerName = CountryNormalizer::class;
                        break;

                    case 'supplier_profiles':
                        $objectNormalizerName = SupplierProfileNormalizer::class;
                        break;

                    case 'attributes':
                        $objectNormalizerName = AttributeNormalizer::class;
                        break;
                }

                if (null !== $objectNormalizerName) {
                    $normalizer = new AggregationNormalizer();
                    $searchResponse->addAggregation(
                        $normalizer->denormalize(
                            $aggregation,
                            $objectNormalizerName
                        )
                    );
                }
            }
        }

        return $searchResponse;
    }

    /**
     * @param $id
     * @param $language
     * @return bool|Model\Product
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function id($id, $language)
    {
        $body = \json_encode([
            'search_handlers' => [
                [
                    'id' => [
                        'include' => [$id]
                    ]
                ]
            ],
            'lang' => $language
        ]);

        $results = $this->guzzle->request('POST', $this->apiUrl.'/search', [
            'body' => $body,
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        return $this->transform->id(
            \json_decode($results->getBody())
        );
    }

    /**
     * @param QueryHandler $queryHandler
     * @param string $schema
     *
     * @return array
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function categories(QueryHandler $queryHandler)
    {
        $results = $this->guzzle->request('GET', $this->apiUrl.'/categories/'.$queryHandler->getLanguage(), [
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        $categoriesNormalizer = new CategoriesNormalizer();

        return $categoriesNormalizer->denormalize(
            \json_decode($results->getBody(), true)
        );
    }

    /**
     * @param QueryHandler $queryHandler
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function brands(QueryHandler $queryHandler)
    {
        $results = $this->guzzle->request('GET', $this->apiUrl.'/brands', [
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        $brandsNormalizer = new BrandsNormalizer();

        return $brandsNormalizer->denormalize(
            \json_decode($results->getBody(), true)
        );
    }

    /**
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function supplierProfiles()
    {
        $results = $this->guzzle->request('GET', $this->apiUrl.'/supplier_profiles', [
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        return $this->transform->supplierProfiles(
            \json_decode($results->getBody())
        );
    }

    public function marking(int $variantId, string $lang)
    {
        $results = $this->guzzle->request('GET', $this->apiUrl.'/markings/'.$lang.'/'.$variantId, [
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        $variantMarkingsNormalizer = new VariantMarkingsNormalizer();

        return $variantMarkingsNormalizer->denormalize(
            \json_decode($results->getBody(), true)
        );
    }

    public function calculateMarking()
    {

    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
}
