<?php

namespace EuropeanSourcing\Apiv3Client\Response;

use EuropeanSourcing\Apiv3Client\Model\SearchLight\Product;

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
    public function setProducts(array $products): static
    {
        $this->products = $products;

        return $this;
    }
}
