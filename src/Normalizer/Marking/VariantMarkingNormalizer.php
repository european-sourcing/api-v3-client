<?php

namespace Medialeads\Apiv3Client\Normalizer\Marking;

use Medialeads\Apiv3Client\Model\Marking\StaticVariablePriceHolder;
use Medialeads\Apiv3Client\Model\Marking\VariantMarking;

class VariantMarkingNormalizer
{
    public function denormalize(array $data): VariantMarking
    {
        $variantMarking = new VariantMarking();
        $variantMarking->setId($data['id']);
        $variantMarking->setKey($data['key']);
        $variantMarking->setIncludedInVariantPrices($data['included_in_variant_prices'] ?? false);
        $variantMarking->setType($data['type']);
        $variantMarking->setComment($data['comment']);

        // width
        $variantMarking->setWidth($data['width']);
        $variantMarking->setMinimumWidth($data['minimum_width']);
        $variantMarking->setMaximumWidth($data['maximum_width']);
        $variantMarking->setFreeEntryWidth($data['free_entry_width']);

        // length
        $variantMarking->setLength($data['length']);
        $variantMarking->setMinimumLength($data['minimum_length']);
        $variantMarking->setMaximumLength($data['maximum_length']);
        $variantMarking->setFreeEntryLength($data['free_entry_length']);

        // diameter
        $variantMarking->setDiameter($data['diameter']);
        $variantMarking->setMinimumDiameter($data['minimum_diameter']);
        $variantMarking->setMaximumDiameter($data['maximum_diameter']);
        $variantMarking->setFreeEntryDiameter($data['free_entry_diameter']);

        // Squared size
        $variantMarking->setSquaredSize($data['squared_size']);
        $variantMarking->setMinimumSquaredSize($data['minimum_squared_size']);
        $variantMarking->setMaximumSquaredSize($data['maximum_squared_size']);
        $variantMarking->setFreeEntrySquaredSize($data['free_entry_squared_size']);

        // quantity
        $variantMarking->setMinimumQuantity($data['minimum_quantity']);
        $variantMarking->setMaximumQuantity($data['maximum_quantity']);

        // logos
        $variantMarking->setNumberOfLogos($data['number_of_logos']);
        $variantMarking->setMinimumNumberOfLogos($data['minimum_number_of_logos']);
        $variantMarking->setMaximumNumberOfLogos($data['maximum_number_of_logos']);
        $variantMarking->setFreeEntryNumberOfLogos($data['free_entry_number_of_logos']);

        // colors
        $variantMarking->setFullColor($data['full_color']);
        $variantMarking->setNumberOfColors($data['number_of_colors']);
        $variantMarking->setMinimumNumberOfColors($data['minimum_number_of_colors']);
        $variantMarking->setMaximumNumberOfColors($data['maximum_number_of_colors']);
        $variantMarking->setFreeEntryNumberOfColors($data['free_entry_number_of_colors']);

        // positions
        $variantMarking->setNumberOfPositions($data['number_of_positions']);
        $variantMarking->setMinimumNumberOfPositions($data['minimum_number_of_positions']);
        $variantMarking->setMaximumNumberOfPositions($data['maximum_number_of_positions']);
        $variantMarking->setFreeEntryNumberOfPositions($data['free_entry_number_of_positions']);

        // marking
        $markingNormalizer = new MarkingNormalizer();
        $variantMarking->setMarking($markingNormalizer->denormalize($data['marking']));

        // marking position
        if ((isset($data['marking_position'])) && (is_array($data['marking_position']))) {
            $markingPositionNormalizer = new MarkingPositionNormalizer();
            $variantMarking->setMarkingPosition($markingPositionNormalizer->denormalizer($data['marking_position']));
        }

        // supplier options
        $supplierOptionNormalizer = new SupplierOptionNormalizer();
        foreach ($data['supplier_options'] as $supplierOption) {
            $variantMarking->addSupplierOption($supplierOptionNormalizer->denormalize($supplierOption));
        }

        // supplier profiles
        $supplierProfileNormalizer = new SupplierProfileNormalizer();
        foreach ($data['supplier_profiles'] as $supplierProfile) {
            $variantMarking->addSupplierProfile($supplierProfileNormalizer->denormalize($supplierProfile));
        }

        // static fixed prices
        if ((isset($data['static_fixed_prices'])) && (is_array($data['static_fixed_prices']))) {
            $staticFixedPriceNormalizer = new StaticFixedPriceNormalizer();
            foreach ($data['static_fixed_prices'] as $staticFixedPrice) {
                $variantMarking->addStaticFixedPrice($staticFixedPriceNormalizer->denormalize($staticFixedPrice));
            }
        }

        // dynamic fixed prices
        if ((isset($data['dynamic_fixed_prices'])) && (is_array($data['dynamic_fixed_prices']))) {
            $dynamicFixedPriceNormalizer = new DynamicFixedPriceNormalizer();
            foreach ($data['dynamic_fixed_prices'] as $dynamicFixedPrice) {
                $variantMarking->addDynamicFixedPrice($dynamicFixedPriceNormalizer->denormalize($dynamicFixedPrice));
            }
        }

        // static variable price holder
        if ((isset($data['static_variable_price_holders'])) && (is_array($data['static_variable_price_holders']))) {
            $staticVariablePriceHolderNormalizer = new StaticVariablePriceHolderNormalizer();
            foreach ($data['static_variable_price_holders'] as $staticVariablePriceHolder) {
                $variantMarking->addStaticVariablePriceHolder($staticVariablePriceHolderNormalizer->denormalize($staticVariablePriceHolder));
            }
        }

        // dynamic variable price holder
        if ((isset($data['dynamic_variable_price_holders'])) && (is_array($data['dynamic_variable_price_holders']))) {
            $dynamicVariablePriceHolderNormalizer = new DynamicVariablePriceHolderNormalizer();
            foreach ($data['dynamic_variable_price_holders'] as $dynamicVariablePriceHolder) {
                $variantMarking->addDynamicVariablePriceHolder($dynamicVariablePriceHolderNormalizer->denormalize($dynamicVariablePriceHolder));
            }
        }

        return $variantMarking;
    }
}
