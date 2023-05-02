<?php

namespace Medialeads\Apiv3Client\Response;

use Medialeads\Apiv3Client\Model\SearchLight\Product;

class SearchLightResponse extends AbstractSearchResponse
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
    public function setProducts(array $products): SearchLightResponse
    {
        $this->products = $products;

        return $this;
    }
}
