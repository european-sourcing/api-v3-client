<?php

namespace Medialeads\Apiv3Client\Normalizer\Marking;

use Medialeads\Apiv3Client\Model\Marking\DynamicVariablePriceHolder;

class DynamicVariablePriceHolderNormalizer
{
    public function denormalize(array $data): DynamicVariablePriceHolder
    {
        $dynamicVariablePriceHolder = new DynamicVariablePriceHolder();
        $dynamicVariablePriceHolder->setId($data['id']);
        $dynamicVariablePriceHolder->setCondition($data['condition']);
        $dynamicVariablePriceHolder->setTotalPrice($data['total_price']);

        $supplierProfileNormalizer = new SupplierProfileNormalizer();
        $dynamicVariablePriceHolder->setSupplierProfile(
            $supplierProfileNormalizer->denormalize($data['supplier_profile'])
        );

        $markingFeeNormalizer = new MarkingFeeNormalizer();
        foreach ($data['marking_fees'] as $markingFee) {
            $dynamicVariablePriceHolder->addMarkingFee(
                $markingFeeNormalizer->denormalize($markingFee)
            );
        }

        $markingPriceNormalizer = new MarkingPriceNormalizer();
        foreach ($data['dynamic_variable_prices'] as $dynamicVariablePrice) {
            $dynamicVariablePriceHolder->addPrice(
                $markingPriceNormalizer->denormalize($dynamicVariablePrice)
            );
        }

        return $dynamicVariablePriceHolder;
    }
}
