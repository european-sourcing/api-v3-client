<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\SearchLight;

use EuropeanSourcing\Apiv3Client\Model\SearchLight\SupplierProfile;

class SupplierProfileNormalizer extends AbstractSearchLightCachableNormalizer
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
        if (true === array_key_exists('name', $data)) {
            $supplierProfile->setName($data['name']);
        }
        if (true === array_key_exists('country_code', $data)) {
            $supplierProfile->setCountryCode($data['country_code']);
        }

        return $supplierProfile;
    }
}
