<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Marking;

use EuropeanSourcing\Apiv3Client\Model\Marking\StaticVariablePriceHolder;

class StaticVariablePriceHolderNormalizer
{
    public function denormalize(array $data): StaticVariablePriceHolder
    {
        $staticVariablePriceHolder = new StaticVariablePriceHolder();
        $staticVariablePriceHolder->setId($data['id']);
        $staticVariablePriceHolder->setCondition($data['condition'] ?? null);
        $staticVariablePriceHolder->setTotalPrice($data['total_price']);

        $supplierProfileNormalizer = new SupplierProfileNormalizer();
        $staticVariablePriceHolder->setSupplierProfile(
            $supplierProfileNormalizer->denormalize($data['supplier_profile'])
        );

        if (false === empty($data['marking_fees'])) {
            $markingFeeNormalizer = new MarkingFeeNormalizer();
            foreach ($data['marking_fees'] as $markingFee) {
                $staticVariablePriceHolder->addMarkingFee(
                    $markingFeeNormalizer->denormalize($markingFee)
                );
            }
        }

        if (false === empty($data['static_variable_prices'])) {
            $markingPriceNormalizer = new MarkingPriceNormalizer();
            foreach ($data['static_variable_prices'] as $staticVariablePrice) {
                $staticVariablePriceHolder->addPrice(
                    $markingPriceNormalizer->denormalize($staticVariablePrice)
                );
            }
        }

        return $staticVariablePriceHolder;
    }
}
