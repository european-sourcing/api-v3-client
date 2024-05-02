<?php

namespace EuropeanSourcing\Apiv3Client\Response;

use EuropeanSourcing\Apiv3Client\Model\Aggregation\Aggregation;

abstract class AbstractSearchResponse implements SearchResponseInterface
{
    protected array $products = [];

    private int $totalProducts = 0;

    /**
     * @var array<Aggregation>
     */
    private array $aggregations = [];

    public function getTotalProducts(): int
    {
        return $this->totalProducts;
    }

    public function setTotalProducts(int $totalProducts): AbstractSearchResponse
    {
        $this->totalProducts = $totalProducts;

        return $this;
    }

    /**
     * @return array<Aggregation>
     */
    public function getAggregations(): array
    {
        return $this->aggregations;
    }

    /**
     * @param array<Aggregation> $aggregations
     */
    public function setAggregations(array $aggregations): AbstractSearchResponse
    {
        $this->aggregations = $aggregations;

        return $this;
    }

    public function addAggregation(Aggregation $aggregation): AbstractSearchResponse
    {
        $this->aggregations[$aggregation->getName()] = $aggregation;

        return $this;
    }

    public function getAggregation($name): ?Aggregation
    {
        return $this->aggregations[$name] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return isset($this->products[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->products[$offset] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->products[$offset] = $value;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        unset($this->products[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        return current($this->products);
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return key($this->products);
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        return next($this->products);
    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        return reset($this->products);
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {
        return key($this->products) !== null;
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return count($this->products);
    }
}
