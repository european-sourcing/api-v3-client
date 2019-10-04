<?php

namespace Medialeads\Apiv3Client;

use Medialeads\Apiv3Client\Common\ClientInterface;
use Medialeads\Apiv3Client\DataCollector\ApiCollector;
use Medialeads\Apiv3Client\Model\Search;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;


/**
 * Class Client
 *
 * @package EasyWeb\FrontBundle\Apiv3
 *
 * @todo sort
 * @todo hierarchize categories colonne gauche
 * @todo marking
 * @todo order declinations
 */
class Client implements ClientInterface
{
    /**
     * Wrapper de cUrl
     * @var \GuzzleHttp\Client
     */
    private $guzzle;

    /**
     * L'url de l'api v3
     * @var String
     */
    private $apiUrl;

    /**
     * @var string
     */
    private $token;

    /**
     * @var ApiCollector
     */
    private $dataCollector;

    /**
     * Constructor
     *
     * @param \GuzzleHttp\Client $client
     * @param String $apiUrl
     */
    public function __construct(
        \GuzzleHttp\Client $guzzle,
        ApiCollector $apiCollector,
        ParameterBagInterface $parameterBag
    ) {
        $this->guzzle = $guzzle;
        $this->apiUrl = $parameterBag->get('api_url');
        $this->transform = $transform;
        $this->dataCollector = $apiCollector;
    }

    /**
     * @param Search $model
     * @param $language
     * @param $page
     * @param $perpage
     * @param $sort
     * @param $sens
     *
     * @return \EasyWeb\FrontBundle\ElasticSearch\Model\ResultSet
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function search(Search $model, $language, $page=1, $perpage=100, $sort='score', $sens='desc')
    {
        //$model->setSupplierIds([]);

        // v1 to v3 sort
        switch($sort) {
            case 'score':
                $sort = 'relevance';
                break;
            case 'update':
                $sort = 'last_indexed_at';
                break;
            case 'price':
                break;
        }

        $start = microtime(1);

        $body = \json_encode(
            array_merge(
                $model->getApiV3Parameters(),
                [
                    'lang' => $language,
                    'page' => $page,
                    'limit' => $perpage,
                    'sort_field' => $sort,
                    'sort_direction' => $sens
                ]
            )
        );

        $results = $this->guzzle->request('POST', $this->apiUrl.'/search', [
            'body' => $body,
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        $this->dataCollector->add('search', [
            'time' => (microtime(1) - $start),
            'body' => $body
        ]);

        return $this->transform->resultSet(
            \json_decode($results->getBody()),
            $language
        );
    }

    /**
     * @param Search $model
     * @param $language
     * @return \EasyWeb\FrontBundle\ElasticSearch\Model\ResultSet
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function ids(Search $model, $language)
    {
        return $this->search($model, $language, 1, 10, 'score', 'desc');
    }

    /**
     * @param $id
     * @param $language
     * @return bool|Model\Product
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function id($id, $language)
    {
        $start = microtime(1);

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

        $this->dataCollector->add('id', [
            'time' => (microtime(1) - $start),
            'body' => $body
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
        $start = microtime(1);

        $results = $this->guzzle->request('GET', $this->apiUrl.'/categories/'.$language, [
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        $this->dataCollector->add('categories', [
            'time' => (microtime(1) - $start),
            'body' => null
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
        $start = microtime(1);

        $results = $this->guzzle->request('GET', $this->apiUrl.'/brands', [
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        $this->dataCollector->add('categories', [
            'time' => (microtime(1) - $start),
            'body' => null
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
        $start = microtime(1);

        $results = $this->guzzle->request('GET', $this->apiUrl.'/supplier_profiles', [
            'headers' => [
                'X-AUTH-TOKEN' => $this->getToken()
            ]
        ]);

        $this->dataCollector->add('categories', [
            'time' => (microtime(1) - $start),
            'body' => null
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

    /**
     * @param string $token
     * @return Client
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }
}
