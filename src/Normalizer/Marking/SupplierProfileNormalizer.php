<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Marking;

use EuropeanSourcing\Apiv3Client\Model\Marking\SupplierProfile;

class SupplierProfileNormalizer
{
    public function denormalize(array $data): SupplierProfile
    {
        $supplierProfile = new SupplierProfile();
        $supplierProfile->setId($data['id']);
        $supplierProfile->setCountryCode($data['country_code']);

        return $supplierProfile;
    }
}
