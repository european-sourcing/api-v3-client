<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\Brand;

class BrandNormalizer extends AbstractCachableNormalizer
{
    public function denormalize(array $data): Brand
    {
        /** @var Brand $brand */
        $brand = $this->getCache($data['id']);
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

    protected function getNewItem($id): object
    {
        $brand = new Brand();

        return $brand->setId($id);
    }
}
