<?php

namespace Medialeads\Normalizer;

use Medialeads\Apiv3Client\Model\Brand;

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
        $brand->setSuffix($data['suffix']);

        if (isset($data['count'])) {
            $brand->setCount($data['count']);
        }

        if (!empty($data['logo'])) {
            $imageDenormalizer = new ImageNormalizer();
            $brand->setLogo($imageDenormalizer->denormalize($data['logo']));
        }

        return $brand;
    }
}
