<?php

namespace Medialeads\Apiv3Client\Normalizer;

use Medialeads\Apiv3Client\Common\Collection;

class BrandsNormalizer
{
    public function denormalize(array $data): Collection
    {
        $brands = new Collection();
        $brandNormalizer = new BrandNormalizer();

        foreach ($data as $row) {
            $brands->add($row['id'], $brandNormalizer->denormalize($row));
        }

        return $brands;
    }
}
