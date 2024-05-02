<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Marking;

use EuropeanSourcing\Apiv3Client\Model\Marking\DynamicFixedPrice;

class DynamicFixedPriceNormalizer
{
    public function denormalize(array $data): DynamicFixedPrice
    {
        $dynamicFixedPrice = new DynamicFixedPrice();
        $dynamicFixedPrice->setId($data['id']);
        $dynamicFixedPrice->setValue($data['value']);
        $dynamicFixedPrice->setReducedValue($data['reduced_value']);
        $dynamicFixedPrice->setCalculationValue($data['calculation_value']);
        $dynamicFixedPrice->setCondition($data['condition']);
        $dynamicFixedPrice->setTotalPrice((bool) $data['total_price']);

        $supplierProfileNormalizer = new SupplierProfileNormalizer();
        $dynamicFixedPrice->setSupplierProfile(
            $supplierProfileNormalizer->denormalize($data['supplier_profile'])
        );

        $markingFeeNormalizer = new MarkingFeeNormalizer();
        foreach ($data['marking_fees'] as $markingFee) {
            $dynamicFixedPrice->addMarkingFee($markingFeeNormalizer->denormalize($markingFee));
        }

        return $dynamicFixedPrice;
    }
}
