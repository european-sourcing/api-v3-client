<?php

namespace Medialeads\Apiv3Client;

use Medialeads\Apiv3Client\Normalizer\Aggregation\AggregationNormalizer;
use Medialeads\Apiv3Client\Normalizer\Aggregation\AttributeNormalizer;
use Medialeads\Apiv3Client\Normalizer\Aggregation\BrandNormalizer;
use Medialeads\Apiv3Client\Normalizer\Aggregation\CategoryNormalizer;
use Medialeads\Apiv3Client\Normalizer\Aggregation\MarkingNormalizer;
use Medialeads\Apiv3Client\Normalizer\Aggregation\SupplierProfileNormalizer;
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
                $objectNormalizer = null;

                switch($aggregation['name']) {
                    case 'marking':
                        $objectNormalizerName = MarkingNormalizer::class;
                        break;

                    case 'brands':
                        $objectNormalizerName = BrandNormalizer::class;
                        break;

                    case 'supplier_profiles':
                        $objectNormalizerName = SupplierProfileNormalizer::class;
                        break;

                    case 'attributes':
                        $objectNormalizerName = AttributeNormalizer::class;
                        break;

                    case 'categories':
                        $objectNormalizerName = CategoryNormalizer::class;
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
     * @param Search $model
     * @param $language
     * @param string $schema
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function categories(Search $model, $language, $schema = 'tree')
    {
        $results = $this->guzzle->request('GET', $this->apiUrl.'/categories/'.$language, [
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        return $this->transform->categories(
            \json_decode($results->getBody()),
            null,
            $schema
        );
    }

    /**
     * @param Search $model
     * @param $language
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function brands(Search $model, $language = null)
    {
        $results = $this->guzzle->request('GET', $this->apiUrl.'/brands', [
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        return $this->transform->brands(
            \json_decode($results->getBody())
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

    /*public function lastModified(Search $model, $language)
    {
        $results = $this->guzzle->call(new HttpPostJson($this->apiUrl.'/last-modified', array_merge(
            $model->getElasticparameters(),
            array('lang' => $language)
        )));

        return $this->transform->lastModified($results);
    }*/

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
}
