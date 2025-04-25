<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

class ProductsNormalizer
{
    /**
     * @throws \Exception
     */
    public function denormalize(array $data): array
    {
        $products = [];

        $productNormalizer = new ProductNormalizer();
        foreach ($data as $row) {
            $products[] = $productNormalizer->denormalize($row);
        }

        return $products;
    }
}
