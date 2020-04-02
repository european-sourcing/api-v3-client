<?php

namespace Medialeads\Apiv3Client\Normalizer\Marking;

use Medialeads\Apiv3Client\Model\Marking\SupplierOptionStaticVariablePriceHolder;

class SupplierOptionStaticVariablePriceHolderNormalizer
{
    public function denormalize(array $data): SupplierOptionStaticVariablePriceHolder
    {
        $staticVariablePriceHolder = new SupplierOptionStaticVariablePriceHolder();
        $staticVariablePriceHolder->setId($data['id']);
        $staticVariablePriceHolder->setSupplierProfileId($data['supplier_profile_id']);

        $optionPriceNormalizer = new SupplierOptionPriceNormalizer();
        foreach ($data['option_prices'] as $optionPrice) {
            $staticVariablePriceHolder->addOptionPrice($optionPriceNormalizer->denormalize($optionPrice));
        }

        return $staticVariablePriceHolder;
    }
}
