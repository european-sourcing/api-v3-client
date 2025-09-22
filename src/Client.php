<?php

namespace EuropeanSourcing\Apiv3Client;

use EuropeanSourcing\Apiv3Client\Model\ProductDetails\Product;
use EuropeanSourcing\Apiv3Client\Normalizer\ProductDetails\ProductNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\ProductDetailsNormalizer;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use EuropeanSourcing\Apiv3Client\Common\Collection;
use EuropeanSourcing\Apiv3Client\Model\Aggregation\Aggregation;
use EuropeanSourcing\Apiv3Client\Model\Marking\Marking;
use EuropeanSourcing\Apiv3Client\Model\Variant;
use EuropeanSourcing\Apiv3Client\Normalizer\Aggregation\AggregationNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\Aggregation\AttributeNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\Aggregation\BrandNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\Aggregation\CategoriesNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\Aggregation\CountryNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\Aggregation\CountryOfOriginNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\Aggregation\MarkingNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\Aggregation\SupplierProfileNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\BrandsNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\Marking\VariantMarkingsNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\ProductsNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\SearchLight\ProductsNormalizer as ProductsLightNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\SupplierNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\SupplierProfilesNormalizer;
use EuropeanSourcing\Apiv3Client\Response\SearchLightResponse;
use EuropeanSourcing\Apiv3Client\Response\SearchResponse;
use EuropeanSourcing\Apiv3Client\Response\SearchResponseInterface;
use EuropeanSourcing\Apiv3Client\Service\NormalizerService;

use function json_decode;
use function json_encode;

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

    public function __construct(
        \GuzzleHttp\Client $guzzle,
        string $apiUrl,
        string $token
    ) {
        $this->guzzle = $guzzle;
        $this->apiUrl = $apiUrl;
        $this->token = $token;
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function search(QueryHandler $queryHandler): SearchResponse
    {
        $body = json_encode(
            $queryHandler->export()
        );

        $response = $this->guzzle->request('POST', $this->apiUrl . '/search', [
            'body' => $body,
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        $results = json_decode($response->getBody(), true);

        $normalizerService = new NormalizerService();
        $productsNormalizer = $normalizerService->getNormalizer(ProductsNormalizer::class);
        $products = $productsNormalizer->denormalize($results['products'] ?? []);

        $searchResponse = new SearchResponse();
        $this->initSearchResponse($searchResponse, $products, $results);

        return $searchResponse;
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function searchLight(QueryHandler $queryHandler): SearchLightResponse
    {
        $body = json_encode(
            $queryHandler->export()
        );

        $response = $this->guzzle->request('POST', $this->apiUrl . '/search/light', [
            'body' => $body,
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        $results = json_decode($response->getBody(), true);

        $normalizerService = new NormalizerService();
        /** @var ProductsLightNormalizer $productsNormalizer */
        $productsNormalizer = $normalizerService->getNormalizer(ProductsLightNormalizer::class);
        $products = $productsNormalizer->denormalize($results['products'] ?? []);

        $searchResponse = new SearchLightResponse();
        $this->initSearchResponse($searchResponse, $products, $results);

        return $searchResponse;
    }

    /**
     * @throws GuzzleException
     */
    public function productDetailsByVariantId(int $variantId, ?string $countryCode = null): Product
    {
        $options = [
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ];

        if (null !== $countryCode) {
            $options['query'] = ['country_code' => $countryCode];
        }

        $results = $this->guzzle->request(
            'GET',
            $this->apiUrl . '/products/details/byVariantId/' . $variantId,
            $options
        );

        $normalizerService = new NormalizerService();
        /** @var ProductNormalizer $productsNormalizer */
        $productsNormalizer = $normalizerService->getNormalizer(ProductNormalizer::class);

        return $productsNormalizer->denormalize(
            json_decode($results->getBody(), true)
        );
    }

    /**
     * @throws GuzzleException
     */
    public function categories(string $language): Aggregation
    {
        $results = $this->guzzle->request('GET', $this->apiUrl . '/categories/' . $language, [
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        $categoriesNormalizer = new CategoriesNormalizer();

        return $categoriesNormalizer->denormalize(
            json_decode($results->getBody(), true)
        );
    }

    /**
     * @throws GuzzleException
     */
    public function brands(): Collection
    {
        $results = $this->guzzle->request('GET', $this->apiUrl . '/brands', [
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        $brandsNormalizer = new BrandsNormalizer();

        return $brandsNormalizer->denormalize(
            json_decode($results->getBody(), true)
        );
    }

    /**
     * @throws GuzzleException
     */
    public function suppliers(): Collection
    {
        $results = $this->guzzle->request('GET', $this->apiUrl . '/suppliers', [
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        $suppliersNormalizer = new SupplierProfilesNormalizer();

        return $suppliersNormalizer->denormalize(
            json_decode($results->getBody(), true)
        );
    }

    /**
     * @throws GuzzleException
     */
    public function supplierProfiles(): Collection
    {
        $results = $this->guzzle->request('GET', $this->apiUrl . '/supplier_profiles', [
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        $supplierProfilesNormalizer = new SupplierProfilesNormalizer();

        return $supplierProfilesNormalizer->denormalize(
            json_decode($results->getBody(), true)
        );
    }

    /**
     * @throws GuzzleException
     */
    public function supplierProfilesForSupplier($id): Collection
    {
        $results = $this->guzzle->request('GET', $this->apiUrl . '/supplier_profiles/supplier/' . $id, [
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        $supplierProfilesNormalizer = new SupplierProfilesNormalizer();

        return $supplierProfilesNormalizer->denormalize(
            json_decode($results->getBody(), true)
        );
    }

    /**
     * @throws GuzzleException
     */
    public function suppliersForSupplierProfile($id)
    {
        $results = $this->guzzle->request('GET', $this->apiUrl . '/suppliers/supplier_profile/' . $id, [
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        $supplierNormalizer = new SupplierNormalizer();

        return $supplierNormalizer->denormalize(
            json_decode($results->getBody(), true)
        );
    }

    /**
     * @throws GuzzleException
     */
    public function marking(int $variantId, string $lang): Collection
    {
        $results = $this->guzzle->request('GET', $this->apiUrl . '/markings/' . $lang . '/' . $variantId, [
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        $variantMarkingsNormalizer = new VariantMarkingsNormalizer();

        return $variantMarkingsNormalizer->denormalize(
            json_decode($results->getBody(), true)
        );
    }

    /**
     * @throws GuzzleException
     */
    public function calculateMarking(
        Variant $variant,
        Marking $marking,
        int $quantity,
        int $nbColor,
        int $nbLogo,
        int $nbPosition,
        int $markingMargin,
        int $productMargin
    ): array {
        $body = [
            'variant_id' => $variant->getId(),
            'marking_id' => $marking->getId(),
            'quantityM' => $quantity,
            'nbColor' => $nbColor,
            'nbLogo' => $nbLogo,
            'nbPosition' => $nbPosition,
            'default_marking_margin' => $markingMargin,
            'default_margin' => $productMargin
        ];

        $results = $this->guzzle->request('POST', sprintf('%s/marking/fr/calculatePrice', $this->apiUrl), [
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ],
            'body' => json_encode($body)
        ]);

        return json_decode($results->getBody(), true);
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    public function initSearchResponse(SearchResponseInterface $searchResponse, array $products, array $results): void
    {
        $searchResponse->setProducts($products);
        $searchResponse->setTotalProducts($results['pagination']['total_items']);

        if (!empty($results['aggregations'])) {
            foreach ($results['aggregations'] as $aggregation) {
                switch ($aggregation['name']) {
                    case 'marking':
                        $objectNormalizerName = MarkingNormalizer::class;
                        break;

                    case 'brands':
                        $objectNormalizerName = BrandNormalizer::class;
                        break;

                    case 'country':
                        $objectNormalizerName = CountryNormalizer::class;
                        break;

                    case 'country_of_origin':
                        $objectNormalizerName = CountryOfOriginNormalizer::class;
                        break;

                    case 'supplier_profiles':
                        $objectNormalizerName = SupplierProfileNormalizer::class;
                        break;

                    case 'attributes':
                        $objectNormalizerName = AttributeNormalizer::class;
                        break;
                    case 'categories':
                        $normalizer = new CategoriesNormalizer();
                        $searchResponse->addAggregation(
                            $normalizer->denormalize($aggregation['rows'] ?? [])
                        );
                        continue 2;
                    default:
                        continue 2;
                }

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
}
