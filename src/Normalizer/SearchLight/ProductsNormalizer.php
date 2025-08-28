<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\SearchLight;

use EuropeanSourcing\Apiv3Client\Normalizer\AbstractNormalizer;
use Exception;

class ProductsNormalizer extends AbstractNormalizer
{
    /**
     * @throws Exception
     */
    public function denormalize(array $data): array
    {
        /** @var ProductNormalizer $productNormalizer */
        $productNormalizer = $this->normalizerService->getNormalizer(ProductNormalizer::class);

        $products = [];
        foreach ($data as $row) {
            $products[] = $productNormalizer->denormalize($row);
        }

        return $products;
    }
}
