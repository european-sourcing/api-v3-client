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
        $minimumQuantity->setId($data['id']);
        $minimumQuantity->setValue($data['value']);

        if (!empty($data['supplier_profiles'])) {
            $supplierProfileNormalizer = new SupplierProfileNormalizer();
            foreach ($data['supplier_profiles'] as $row) {
                $minimumQuantity->addSupplierProfile($supplierProfileNormalizer->denormalize($row));
            }
        }

        return $minimumQuantity;
    }
}
