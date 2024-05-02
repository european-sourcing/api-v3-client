<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\Price;

class PriceNormalizer
{
    /**
     * @param array $data
     *
     * @return Price
     */
    public function denormalize(array $data)
    {
        $price = new Price();
        $price->setId($data['id']);
        $price->setValue($data['value']);
        $price->setReducedValue($data['reduced_value']);

        // for sample price
        if (isset($data['from_quantity'])) {
            $price->setFromQuantity($data['from_quantity']);
        }

        $price->setCalculationValue($data['calculation_value']);

        if (!empty($data['supplier_profile'])) {
            $supplierProfileNormalizer = new SupplierProfileNormalizer();
            $price->setSupplierProfile($supplierProfileNormalizer->denormalize($data['supplier_profile']));
        }

        return $price;
    }
}
