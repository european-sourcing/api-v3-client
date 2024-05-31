<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Marking;

use EuropeanSourcing\Apiv3Client\Model\Marking\StaticFixedPrice;

class StaticFixedPriceNormalizer
{
    public function denormalize(array $data): StaticFixedPrice
    {
        $staticFixedPrice = new StaticFixedPrice();
        $staticFixedPrice->setId($data['id']);
        $staticFixedPrice->setValue($data['value']);
        $staticFixedPrice->setCalculationValue($data['calculation_value']);
        $staticFixedPrice->setCondition($data['condition']);
        $staticFixedPrice->setTotalPrice((bool) $data['total_price']);

        $supplierProfileNormalizer = new SupplierProfileNormalizer();
        $staticFixedPrice->setSupplierProfile(
            $supplierProfileNormalizer->denormalize($data['supplier_profile'])
        );

        $markingFeeNormalizer = new MarkingFeeNormalizer();
        foreach ($data['marking_fees'] as $markingFee) {
            $staticFixedPrice->addMarkingFee($markingFeeNormalizer->denormalize($markingFee));
        }

        return $staticFixedPrice;
    }
}
