<?php

namespace Medialeads\Apiv3Client\Normalizer;

use Medialeads\Apiv3Client\Model\MinimumQuantity;

class MinimumQuantityNormalizer
{
    /**
     * @param array $data
     *
     * @return MinimumQuantity
     */
    public function denormalize(array $data)
    {
        $minimumQuantity = new MinimumQuantity();
        $minimumQuantity->setValue($data['value']);

        $supplierProfileNormalizer = new SupplierProfileNormalizer();
        $minimumQuantity->setSupplierProfile($supplierProfileNormalizer->denormalize($data['supplier_profile']));

        return $minimumQuantity;
    }
}
