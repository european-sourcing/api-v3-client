<?php

namespace EuropeanSourcing\Apiv3Client\Response;

use ArrayAccess;
use Countable;
use Iterator;
use EuropeanSourcing\Apiv3Client\Model\Aggregation\Aggregation;

interface SearchResponseInterface extends ArrayAccess, Iterator, Countable
{
    public function getProducts(): array;

    public function setProducts(array $products): static;

    public function getTotalProducts(): int;

    public function setTotalProducts(int $totalProducts): static;

    /**
     * @return array<Aggregation>
     */
    public function getAggregations(): array;

    /**
     * @param array<Aggregation> $aggregations
     */
    public function setAggregations(array $aggregations): static;

    public function getAggregation($name): ?Aggregation;

    public function addAggregation(Aggregation $aggregation): static;
}
