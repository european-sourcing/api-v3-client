<?php

namespace Medialeads\Apiv3Client\Normalizer;

class BrandsNormalizer
{
    /**
     * @param array $data
     *
     * @return array
     */
    public function denormalize(array $data)
    {
        $brands = [];
        $brandNormalizer = new BrandNormalizer();

        foreach ($data as $row) {
            $brands[$row['id']] = $brandNormalizer->denormalize($row);
        }

        return array_values($brands);
    }
}
