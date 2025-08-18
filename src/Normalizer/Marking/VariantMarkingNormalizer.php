<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Marking;

use EuropeanSourcing\Apiv3Client\Model\Marking\VariantMarking;

class VariantMarkingNormalizer
{
    public function denormalize(array $data): VariantMarking
    {
        $variantMarking = new VariantMarking();
        $variantMarking->setId($data['id']);
        $variantMarking->setKey($data['key']);
        $variantMarking->setIncludedInVariantPrices($data['included_in_variant_prices'] ?? false);
        $variantMarking->setType($data['type']);
        $variantMarking->setComment($data['comment'] ?? null);

        // width
        $variantMarking->setWidth($data['width'] ?? null);
        $variantMarking->setMinimumWidth($data['minimum_width'] ?? null);
        $variantMarking->setMaximumWidth($data['maximum_width'] ?? null);

        // length
        $variantMarking->setLength($data['length'] ?? null);
        $variantMarking->setMinimumLength($data['minimum_length'] ?? null);
        $variantMarking->setMaximumLength($data['maximum_length'] ?? null);

        // diameter
        $variantMarking->setDiameter($data['diameter'] ?? null);
        $variantMarking->setMinimumDiameter($data['minimum_diameter'] ?? null);
        $variantMarking->setMaximumDiameter($data['maximum_diameter'] ?? null);

        // Squared size
        $variantMarking->setSquaredSize($data['squared_size'] ?? null);
        $variantMarking->setMinimumSquaredSize($data['minimum_squared_size'] ?? null);
        $variantMarking->setMaximumSquaredSize($data['maximum_squared_size'] ?? null);

        // quantity
        $variantMarking->setMinimumQuantity($data['minimum_quantity'] ?? null);
        $variantMarking->setMaximumQuantity($data['maximum_quantity'] ?? null);

        // logos
        $variantMarking->setNumberOfLogos($data['number_of_logos'] ?? null);
        $variantMarking->setMinimumNumberOfLogos($data['minimum_number_of_logos'] ?? null);
        $variantMarking->setMaximumNumberOfLogos($data['maximum_number_of_logos'] ?? null);

        // colors
        $variantMarking->setFullColor($data['full_color']);
        $variantMarking->setNumberOfColors($data['number_of_colors'] ?? null);
        $variantMarking->setMinimumNumberOfColors($data['minimum_number_of_colors'] ?? null);
        $variantMarking->setMaximumNumberOfColors($data['maximum_number_of_colors'] ?? null);

        // positions
        $variantMarking->setNumberOfPositions($data['number_of_positions'] ?? null);
        $variantMarking->setMinimumNumberOfPositions($data['minimum_number_of_positions'] ?? null);
        $variantMarking->setMaximumNumberOfPositions($data['maximum_number_of_positions'] ?? null);

        // marking
        $markingNormalizer = new MarkingNormalizer();
        $variantMarking->setMarking($markingNormalizer->denormalize($data['marking']));

        // marking position
        if ((!empty($data['marking_position'])) && (is_array($data['marking_position']))) {
            $markingPositionNormalizer = new MarkingPositionNormalizer();
            $variantMarking->setMarkingPosition($markingPositionNormalizer->denormalizer($data['marking_position']));
        }

        // supplier options
        if (false === empty($data['supplier_options'])) {
            $supplierOptionNormalizer = new SupplierOptionNormalizer();
            foreach ($data['supplier_options'] as $supplierOption) {
                $variantMarking->addSupplierOption($supplierOptionNormalizer->denormalize($supplierOption));
            }
        }

        // supplier profiles
        if (false === empty($data['supplier_profiles'])) {
            $supplierProfileNormalizer = new SupplierProfileNormalizer();
            foreach ($data['supplier_profiles'] as $supplierProfile) {
                $variantMarking->addSupplierProfile($supplierProfileNormalizer->denormalize($supplierProfile));
            }
        }

        // static fixed prices
        if ((!empty($data['static_fixed_prices'])) && (is_array($data['static_fixed_prices']))) {
            $staticFixedPriceNormalizer = new StaticFixedPriceNormalizer();
            foreach ($data['static_fixed_prices'] as $staticFixedPrice) {
                $variantMarking->addStaticFixedPrice($staticFixedPriceNormalizer->denormalize($staticFixedPrice));
            }
        }

        // dynamic fixed prices
        if ((!empty($data['dynamic_fixed_prices'])) && (is_array($data['dynamic_fixed_prices']))) {
            $dynamicFixedPriceNormalizer = new DynamicFixedPriceNormalizer();
            foreach ($data['dynamic_fixed_prices'] as $dynamicFixedPrice) {
                $variantMarking->addDynamicFixedPrice($dynamicFixedPriceNormalizer->denormalize($dynamicFixedPrice));
            }
        }

        // static variable price holder
        if ((!empty($data['static_variable_price_holders'])) && (is_array($data['static_variable_price_holders']))) {
            $staticVariablePriceHolderNormalizer = new StaticVariablePriceHolderNormalizer();
            foreach ($data['static_variable_price_holders'] as $staticVariablePriceHolder) {
                $variantMarking->addStaticVariablePriceHolder($staticVariablePriceHolderNormalizer->denormalize($staticVariablePriceHolder));
            }
        }

        // dynamic variable price holder
        if ((!empty($data['dynamic_variable_price_holders'])) && (is_array($data['dynamic_variable_price_holders']))) {
            $dynamicVariablePriceHolderNormalizer = new DynamicVariablePriceHolderNormalizer();
            foreach ($data['dynamic_variable_price_holders'] as $dynamicVariablePriceHolder) {
                $variantMarking->addDynamicVariablePriceHolder($dynamicVariablePriceHolderNormalizer->denormalize($dynamicVariablePriceHolder));
            }
        }

        return $variantMarking;
    }
}
