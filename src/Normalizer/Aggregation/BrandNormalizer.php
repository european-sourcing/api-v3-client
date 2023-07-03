<?php

namespace Medialeads\Apiv3Client\Normalizer\Aggregation;

use Medialeads\Apiv3Client\Model\Aggregation\Brand;

class BrandNormalizer
{
    public function denormalize(array $data): Brand
    {
        $brand = new Brand();
        $brand->setId($data['id']);
        $brand->setName($data['name']);
        $brand->setCount($data['count']);
        if (false === empty($data['slug'])) {
            $brand->setSlug($data['slug']);
        }
        if (false === empty($data['logo'])) {
            $brand->setLogo($data['logo']);
        }

        return $brand;
    }
}
