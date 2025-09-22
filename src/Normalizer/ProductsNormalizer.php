<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

class ProductsNormalizer extends AbstractNormalizer
{
    /**
     * @throws \Exception
     */
    public function denormalize(array $data): array
    {
        $products = [];

        $productNormalizer = $this->normalizerService->getNormalizer(ProductNormalizer::class);
        foreach ($data as $row) {
            $products[] = $productNormalizer->denormalize($row);
        }

        return $products;
    }
}
