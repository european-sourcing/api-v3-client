<?php

namespace EuropeanSourcing\Apiv3Client\Response;

use EuropeanSourcing\Apiv3Client\Model\Product;

class SearchResponse extends AbstractSearchResponse
{
    /**
     * @return array<Product>
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param array<Product> $products
     */
    public function setProducts(array $products): SearchResponse
    {
        $this->products = $products;

        return $this;
    }
}
