<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Marking;

use EuropeanSourcing\Apiv3Client\Model\Marking\SupplierOption;

class SupplierOptionNormalizer
{
    public function denormalize(array $data): SupplierOption
    {
        $supplierOption = new SupplierOption();
        $supplierOption->setCode($data['code']);
        $supplierOption->setCount($data['count']);

        $supplierOptionTranslationNormalizer = new SupplierOptionTranslationNormalizer();
        $supplierOption->setTranslation($supplierOptionTranslationNormalizer->denormalize($data['translations']));

        if (false === empty($data['supplier_option_static_variable_price_holders'])) {
            $staticVariablePriceHolderNormalizer = new SupplierOptionStaticVariablePriceHolderNormalizer();
            foreach ($data['supplier_option_static_variable_price_holders'] as $supplierOptionStaticVariablePriceHolder) {
                $supplierOption->addStaticVariablePriceHolder(
                    $staticVariablePriceHolderNormalizer->denormalize($supplierOptionStaticVariablePriceHolder)
                );
            }
        }

        if (false === empty($data['supplier_option_dynamic_variable_price_holders'])) {
            $dynamicVariablePriceHolderNormalizer = new SupplierOptionDynamicVariablePriceHolderNormalizer();
            foreach ($data['supplier_option_dynamic_variable_price_holders'] as $supplierOptionDynamicVariablePriceHolder) {
                $supplierOption->addDynamicVariablePriceHolder($dynamicVariablePriceHolderNormalizer->denormalize($supplierOptionDynamicVariablePriceHolder));
            }
        }

        return $supplierOption;
    }
}
