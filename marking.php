<?php

require 'vendor/autoload.php';

use Medialeads\Apiv3Client\QueryBuilder;
use Medialeads\Apiv3Client\SearchHandler;
use Medialeads\Apiv3Client\QueryHandler;

$guzzle = new \GuzzleHttp\Client([
    'headers' => [
        'Content-Type' => 'application/ld+json',
        'Accept' => 'application/ld+json'
    ]
]);
$client = new \Medialeads\Apiv3Client\Client(
    $guzzle,
    'https://product-api.europeansourcing.com/api/v1.1',
    'HmZIP22OcpKnJ2Txhk164OwBsSEu4zF7'
);

$queryBuilder = new QueryBuilder();

$searchHandler = new SearchHandler();
$searchHandler
    ->add($queryBuilder->variant([3966638]))
    //->add($queryBuilder->marking([32]))
    //->add($queryBuilder->internalReference(['6LVO6Z'], 'strict'))
    //->add($queryBuilder->hasMarking(true))
    //->add($queryBuilder->query('stylo'))
;

$queryHandler = new QueryHandler('fr');
$queryHandler->setPage(1);
$queryHandler->setPerpage(15);
$queryHandler->addSearchHandler($searchHandler);

//$response = $client->search($queryHandler);

$response = $client->marking(3256691, 'fr');


dump($response);
