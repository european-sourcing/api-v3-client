<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Common\Collection;

class BrandsNormalizer extends AbstractNormalizer
{
    public function denormalize(array $data): Collection
    {
        $brands = new Collection();
        /** @var BrandNormalizer $brandNormalizer */
        $brandNormalizer = $this->normalizerService->getNormalizer(BrandNormalizer::class);

        foreach ($data as $row) {
            $brands->add($row['id'], $brandNormalizer->denormalize($row));
        }

        return $brands;
    }
}
