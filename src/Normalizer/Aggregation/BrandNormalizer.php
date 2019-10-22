<?php

namespace Medialeads\Apiv3Client\Normalizer\Aggregation;

use Medialeads\Apiv3Client\Model\Aggregation\Brand;

class BrandNormalizer
{
    /**
     * @param array $data
     *
     * @return Brand
     */
    public function denormalize(array $data)
    {
        $brand = new Brand();
        $brand->setId($data['id']);
        $brand->setName($data['name']);
        $brand->setSlug($data['slug']);
        $brand->setCount($data['count']);

        return $brand;
    }
}
