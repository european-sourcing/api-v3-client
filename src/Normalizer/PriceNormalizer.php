<?php

namespace Medialeads\Apiv3Client\Normalizer;

use Medialeads\Apiv3Client\Model\Price;

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
        $price->setFromQuantity($data['from_quantity']);
        $price->setCalculationValue($data['calculation_value']);

        if (!empty($data['supplier_profiles'])) {
            $supplierProfileNormalizer = new SupplierProfileNormalizer();
            foreach ($data['supplier_profiles'] as $row) {
                $price->addSupplierProfile($supplierProfileNormalizer->denormalize($row));
            }
        }

        return $price;
    }
}
