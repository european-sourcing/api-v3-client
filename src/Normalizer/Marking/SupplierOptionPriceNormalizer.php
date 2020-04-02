<?php

namespace Medialeads\Apiv3Client\Normalizer\Marking;

use Medialeads\Apiv3Client\Model\Marking\SupplierOptionPrice;

class SupplierOptionPriceNormalizer
{
    public function denormalize(array $data): SupplierOptionPrice
    {
        $supplierOptionPrice = new SupplierOptionPrice();
        $supplierOptionPrice->setFromQuantity($data['from_quantity']);
        $supplierOptionPrice->setValue($data['value']);
        $supplierOptionPrice->setReducedValue($data['reduced_value']);
        $supplierOptionPrice->setCalculationValue($data['calculation_value']);

        return $supplierOptionPrice;
    }
}