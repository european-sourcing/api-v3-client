<?php

namespace Medialeads\Apiv3Client\Normalizer\Aggregation;

use Medialeads\Apiv3Client\Model\Aggregation\SupplierProfile;

class SupplierProfileNormalizer
{
    /**
     * @param array $data
     *
     * @return SupplierProfile
     */
    public function denormalize(array $data)
    {
        $supplierProfile = new SupplierProfile();
        $supplierProfile->setId($data['id']);
        $supplierProfile->setName($data['name']);
        $supplierProfile->setCount($data['count']);

        return $supplierProfile;
    }
}
