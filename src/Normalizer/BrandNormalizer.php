<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\Brand;

class BrandNormalizer
{
    public function denormalize(array $data): Brand
    {
        $brand = new Brand();
        $brand->setId($data['id']);
        $brand->setName($data['name']);
        $brand->setSlug($data['slug']);

        if (!empty($data['suffix'])) {
            $brand->setSuffix($data['suffix']);
        }

        if (!empty($data['logo'])) {
            $imageDenormalizer = new ImageNormalizer();
            $brand->setLogo($imageDenormalizer->denormalize($data['logo']));
        }

        return $brand;
    }
}
