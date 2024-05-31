<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Marking;

use EuropeanSourcing\Apiv3Client\Model\Marking\SupplierOptionPrice;

class SupplierOptionPriceNormalizer
{
    public function denormalize(array $data): SupplierOptionPrice
    {
        $supplierOptionPrice = new SupplierOptionPrice();
        $supplierOptionPrice->setFromQuantity($data['from_quantity']);
        $supplierOptionPrice->setValue($data['value']);
        $supplierOptionPrice->setCalculationValue($data['calculation_value']);

        return $supplierOptionPrice;
    }
}
