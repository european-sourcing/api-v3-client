<?php

namespace Medialeads\Apiv3Client\Normalizer\SearchLight;

use Exception;

class ProductsNormalizer extends AbstractSearchLightNormalizer
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
