<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Marking;

use EuropeanSourcing\Apiv3Client\Model\Marking\SupplierOptionDynamicVariablePriceHolder;

class SupplierOptionDynamicVariablePriceHolderNormalizer
{
    public function denormalize(array $data): SupplierOptionDynamicVariablePriceHolder
    {
        $dynamicVariablePriceHolder = new SupplierOptionDynamicVariablePriceHolder();
        $dynamicVariablePriceHolder->setId($data['id']);
        $dynamicVariablePriceHolder->setSupplierProfileId($data['supplier_profile_id']);

        if (false === empty($data['option_prices'])) {
            $optionPriceNormalizer = new SupplierOptionPriceNormalizer();
            foreach ($data['option_prices'] as $optionPrice) {
                $dynamicVariablePriceHolder->addOptionPrice($optionPriceNormalizer->denormalize($optionPrice));
            }
        }

        return $dynamicVariablePriceHolder;
    }
}
