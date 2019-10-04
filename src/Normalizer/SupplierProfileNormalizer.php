<?php

namespace Medialeads\Normalizer;

use Medialeads\Apiv3Client\Model\SupplierProfile;

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

        if (isset($data['count'])) {
            $supplierProfile->setCount($data['count']);
        }

        if (isset($data['country_code'])) {
            $supplierProfile->setCountryCode($data['country_code']);
        }

        if (isset($data['address_line1'])) {
            $supplierProfile->setAddressLine1($data['address_line1']);
        }

        if (isset($data['address_line2'])) {
            $supplierProfile->setAddressLine1($data['address_line2']);
        }

        if (isset($data['association'])) {
            $supplierProfile->setAssociation($data['association']);
        }

        if (isset($data['locality'])) {
            $supplierProfile->setLocality($data['locality']);
        }

        if (isset($data['postal_code'])) {
            $supplierProfile->setPostalCode($data['postal_code']);
        }

        return $supplierProfile;
    }
}
