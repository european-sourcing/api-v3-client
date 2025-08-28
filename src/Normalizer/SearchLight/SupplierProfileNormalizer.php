<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\SearchLight;

use EuropeanSourcing\Apiv3Client\Model\SearchLight\SupplierProfile;
use EuropeanSourcing\Apiv3Client\Normalizer\AbstractCachableNormalizer;

class SupplierProfileNormalizer extends AbstractCachableNormalizer
{
    public function getNewItem($id): SupplierProfile
    {
        $supplierProfile = new SupplierProfile();

        return $supplierProfile->setId($id);
    }

    /**
     * @param array{id: int, name: string, country_code: string} $data
     */
    public function denormalize(array $data): SupplierProfile
    {
        /** @var SupplierProfile $supplierProfile */
        $supplierProfile = $this->getCache($data['id']);
        $supplierProfile->setName($data['name'] ?? null);
        $supplierProfile->setCountryCode($data['country_code'] ?? null);

        return $supplierProfile;
    }
}
