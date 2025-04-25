<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\MinimumQuantity;

class MinimumQuantityNormalizer
{
    public function denormalize(array $data): MinimumQuantity
    {
        $minimumQuantity = new MinimumQuantity();
        $minimumQuantity->setValue($data['value']);

        $supplierProfileNormalizer = new SupplierProfileNormalizer();
        $minimumQuantity->setSupplierProfile($supplierProfileNormalizer->denormalize($data['supplier_profile']));

        return $minimumQuantity;
    }
}
