<?php

namespace Medialeads\Apiv3Client\Normalizer\Marking;

use Medialeads\Apiv3Client\Model\Marking\DynamicFixedPrice;

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
        foreach ($data['supplier_profiles'] as $supplierProfile) {
            $dynamicFixedPrice->addSupplierProfile($supplierProfileNormalizer->denormalize($supplierProfile));
        }

        $markingFeeNormalizer = new MarkingFeeNormalizer();
        foreach ($data['marking_fees'] as $markingFee) {
            $dynamicFixedPrice->addMarkingFee($markingFeeNormalizer->denormalize($markingFee));
        }

        return $dynamicFixedPrice;
    }
}
