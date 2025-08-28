<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\SearchLight;

use EuropeanSourcing\Apiv3Client\Model\SearchLight\Brand;
use EuropeanSourcing\Apiv3Client\Normalizer\AbstractCachableNormalizer;

class BrandNormalizer extends AbstractCachableNormalizer
{
    protected function getNewItem($id): Brand
    {
        $brand = new Brand();

        return $brand->setId($id);
    }

    /**
     * @param array{id: int, name: string} $data
     */
    public function denormalize(array $data): Brand
    {
        /** @var Brand $brand */
        $brand = $this->getCache($data['id']);
        $brand->setName($data['name']);

        return $brand;
    }
}
