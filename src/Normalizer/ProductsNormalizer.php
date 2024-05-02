<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

class ProductsNormalizer
{
    /**
     * @param array $data
     *
     * @return array
     *
     * @throws \Exception
     */
    public function denormalize(array $data)
    {
        $products = [];

        $productNormalizer = new ProductNormalizer();
        foreach ($data as $row) {
            $products[] = $productNormalizer->denormalize($row);
        }

        return $products;
    }
}
