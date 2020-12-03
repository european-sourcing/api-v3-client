<?php

namespace Medialeads\Apiv3Client\Response;

use Medialeads\Apiv3Client\Model\Aggregation\Aggregation;

class SearchResponse implements \ArrayAccess,\Iterator, \Countable
{
    /**
     * @var array
     */
    private $products;

    /**
     * @var int
     */
    private $totalProducts;

    /**
     * @var array
     */
    private $aggregations;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = [];
        $this->aggregations = [];
        $this->totalProducts = 0;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param array $products
     *
     * @return SearchResponse
     */
    public function setProducts(array $products)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalProducts(): int
    {
        return $this->totalProducts;
    }

    /**
     * @param int $totalProducts
     *
     * @return SearchResponse
     */
    public function setTotalProducts(int $totalProducts): SearchResponse
    {
        $this->totalProducts = $totalProducts;

        return $this;
    }

    /**
     * @param Aggregation $aggregation
     *
     * @return SearchResponse
     */
    public function addAggregation(Aggregation $aggregation)
    {
        $this->aggregations[$aggregation->getName()] = $aggregation;

        return $this;
    }
    public function getAggregation($name): Aggregation
    {
        if (!isset($this->aggregations[$name])) {
            throw new \Exception(sprintf('Aggregation %s not exists', $name));
        }

        return $this->aggregations[$name];
    }

    /**
     * @return array
     */
    public function getAggregations()
    {
        return $this->aggregations;
    }

    /**
     * @param array $aggregations
     *
     * @return SearchResponse
     */
    public function setAggregations(array $aggregations): SearchResponse
    {
        $this->aggregations = $aggregations;

        return $this;
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
        if (isset($this->products[$offset])) {
            return $this->products[$offset];
        }
        return null;
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
