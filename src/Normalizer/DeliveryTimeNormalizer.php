<?php

namespace Medialeads\Apiv3Client\Normalizer;

use Medialeads\Apiv3Client\Model\DeliveryTime;

class DeliveryTimeNormalizer
{
    /**
     * @param array $data
     *
     * @return DeliveryTime
     */
    public function denormalize(array $data)
    {
        $deliveryTime = new DeliveryTime();
        $deliveryTime->setId($data['id']);
        $deliveryTime->setValue($data['value']);

        if (!empty($data['supplier_profiles'])) {
            $supplierProfileNormalizer = new SupplierProfileNormalizer();
            foreach ($data['supplier_profiles'] as $row) {
                $deliveryTime->addSupplierProfile($supplierProfileNormalizer->denormalize($row));
            }
        }

        return $deliveryTime;
    }
}
