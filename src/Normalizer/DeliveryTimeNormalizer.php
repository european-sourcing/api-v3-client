<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\DeliveryTime;

class DeliveryTimeNormalizer
{
    public function denormalize(array $data): DeliveryTime
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
