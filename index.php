<?php

require 'vendor/autoload.php';

use \Medialeads\Apiv3Client\SearchHandler;
use \Medialeads\Apiv3Client\Request\Query;
use \Medialeads\Apiv3Client\Request\Not;
use \Medialeads\Apiv3Client\Request\Id;
use \Medialeads\Apiv3Client\QueryHandler;
use \Medialeads\Apiv3Client\Request\InternalReference;

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

$searchHandler = new SearchHandler();
$searchHandler
    ->add(new InternalReference('strict', ['6LVO6Z']))
//    ->add(new Query('stylo'))
//    ->add(new Id(['388795']))
;

$queryHandler = new QueryHandler('fr');
$queryHandler->setPage(1);
$queryHandler->setPerpage(15);
$queryHandler->addSearchHandler($searchHandler);

$response = $client->search($queryHandler);



dump($response);
