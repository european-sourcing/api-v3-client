<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Aggregation;

use EuropeanSourcing\Apiv3Client\Model\Aggregation\SupplierProfile;

class SupplierProfileNormalizer
{
    public function denormalize(array $data): SupplierProfile
    {
        $supplierProfile = new SupplierProfile();
        $supplierProfile->setId($data['id']);
        $supplierProfile->setName($data['name']);
        $supplierProfile->setCount($data['count']);
        if (false === empty($data['country_code'])) {
            $supplierProfile->setCountryCode($data['country_code']);
        }

        return $supplierProfile;
    }
}
