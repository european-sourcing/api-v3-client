<?php

namespace Medialeads\Apiv3Client\Response;

use ArrayAccess;
use Countable;
use Iterator;
use Medialeads\Apiv3Client\Model\Aggregation\Aggregation;

interface SearchResponseInterface extends ArrayAccess, Iterator, Countable
{
    public function getProducts(): array;

    public function setProducts(array $products): SearchResponseInterface;

    public function getTotalProducts(): int;

    public function setTotalProducts(int $totalProducts): SearchResponseInterface;

    /**
     * @return array<Aggregation>
     */
    public function getAggregations(): array;

    /**
     * @param array<Aggregation> $aggregations
     */
    public function setAggregations(array $aggregations): SearchResponseInterface;

    public function getAggregation($name): ?Aggregation;

    public function addAggregation(Aggregation $aggregation): SearchResponseInterface;
}
