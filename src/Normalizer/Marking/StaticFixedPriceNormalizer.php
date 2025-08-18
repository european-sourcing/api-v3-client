<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Marking;

use EuropeanSourcing\Apiv3Client\Model\Marking\StaticFixedPrice;

class StaticFixedPriceNormalizer
{
    public function denormalize(array $data): StaticFixedPrice
    {
        $staticFixedPrice = new StaticFixedPrice();
        $staticFixedPrice->setId($data['id']);
        $staticFixedPrice->setValue($data['value'] ?? null);
        $staticFixedPrice->setCalculationValue($data['calculation_value']);
        $staticFixedPrice->setCondition($data['condition'] ?? null);
        $staticFixedPrice->setTotalPrice((bool) $data['total_price']);

        $supplierProfileNormalizer = new SupplierProfileNormalizer();
        $staticFixedPrice->setSupplierProfile(
            $supplierProfileNormalizer->denormalize($data['supplier_profile'])
        );

        if (false === empty($data['marking_fees'])) {
            $markingFeeNormalizer = new MarkingFeeNormalizer();
            foreach ($data['marking_fees'] as $markingFee) {
                $staticFixedPrice->addMarkingFee($markingFeeNormalizer->denormalize($markingFee));
            }
        }

        return $staticFixedPrice;
    }
}
