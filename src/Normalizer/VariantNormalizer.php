<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\Price;
use EuropeanSourcing\Apiv3Client\Model\Variant;

class VariantNormalizer
{
    public function denormalize(array $data): Variant
    {
        $variant = new Variant();
        $variant->setId($data['id']);
        $variant->setName($data['name']);
        $variant->setSlug($data['slug']);
        $variant->setDescription($data['description'] ?? null);
        $variant->setRawDescription($data['raw_description'] ?? null);
        $variant->setSupplierReference($data['supplier_reference']);
        $variant->setStock($data['stock'] ?? null);
        $variant->setMarkingAdditionalInformation($data['marking_additional_information'] ?? null);
        $variant->setNetWeight($data['net_weight'] ?? null);
        $variant->setGrossWeight($data['gross_weight'] ?? null);
        $variant->setEuropeanArticleNumbering($data['european_article_numbering'] ?? null);
        $variant->setMandatoryMarking($data['mandatory_marking']);
        $variant->setInternalReference($data['internal_reference']);
        $variant->setHasPlanetImpact($data['has_planet_impact']);

        $carbonFootprint = $data['carbon_footprint'] ?? null;
        if (null !== $carbonFootprint) {
            $carbonFootprintNormalizer = new CarbonFootprintNormalizer();
            $variant->setCarbonFootprint($carbonFootprintNormalizer->denormalize($carbonFootprint));
        }

        $carbonFootprintTextile = $data['carbon_footprint_textile'] ?? null;
        if (null !== $carbonFootprintTextile) {
            $carbonFootprintTextileNormalizer = new CarbonFootprintTextileNormalizer();
            $variant->setCarbonFootprintTextile(
                $carbonFootprintTextileNormalizer->denormalize($carbonFootprintTextile)
            );
        }

        $dpp = new DppNormalizer();
        $variant->setDpp($dpp->denormalize($data));

        // images
        if (!empty($data['variant_images'])) {
            $imageNormalizer = new ImageNormalizer();
            foreach ($data['variant_images'] as $row) {
                $image = $imageNormalizer->denormalize($row);
                $variant->addImage($image);

                if ($row['id'] == $data['main_variant_image_id']) {
                    $variant->setMainImage($image);
                }
            }
        }

        // keywords
        if (!empty($data['keywords'])) {
            $keywordNormalizer = new KeywordNormalizer();
            foreach ($data['keywords'] as $row) {
                $variant->addKeyword($keywordNormalizer->denormalize($row));
            }
        }

        // supplier_profiles
        if (!empty($data['supplier_profiles'])) {
            $supplierProfileNormalizer = new SupplierProfileNormalizer();
            foreach ($data['supplier_profiles'] as $row) {
                $variant->addSupplierProfile($supplierProfileNormalizer->denormalize($row));
            }
        }

        // sizes
        if (!empty($data['variant_sizes'])) {
            $sizeNormalizer = new SizeNormalizer();
            foreach ($data['variant_sizes'] as $row) {
                $variant->addSize($sizeNormalizer->denormalize($row));
            }
        }

        // packaging
        if (!empty($data['variant_packaging'])) {
            $packagingNormalizer = new PackagingHierarchyNormalizer();
            $variant->setPackaging($packagingNormalizer->denormalize($data['variant_packaging']));
        }

        // minimum_quantities
        if (!empty($data['variant_minimum_quantities'])) {
            $minimumQuantityNormalizer = new MinimumQuantityNormalizer();
            foreach ($data['variant_minimum_quantities'] as $row) {
                if (empty($row['value'])) {
                    continue;
                }
                $variant->addMinimumQuantity($minimumQuantityNormalizer->denormalize($row));
            }
        }

        // prices
        if (!empty($data['variant_prices'])) {
            $priceNormalizer = new PriceNormalizer();
            $lowestPrice = null;
            foreach ($data['variant_prices'] as $row) {
                /** @var Price $price */
                $price = $priceNormalizer->denormalize($row);
                $variant->addPrice($price);

                if ((null === $lowestPrice) || ($price->getCalculationValue() < $lowestPrice->getCalculationValue())) {
                    $lowestPrice = $price;
                }
            }

            $variant->setLowestPrice($lowestPrice);
        }

        // sample_prices
        if (!empty($data['variant_sample_prices'])) {
            $priceNormalizer = new PriceNormalizer();
            foreach ($data['variant_sample_prices'] as $row) {
                $variant->addSamplePrice($priceNormalizer->denormalize($row));
            }
        }

        // list_prices
        if (!empty($data['variant_list_prices'])) {
            $priceNormalizer = new PriceNormalizer();
            foreach ($data['variant_list_prices'] as $row) {
                $variant->addListPrice($priceNormalizer->denormalize($row));
            }
        }

        // external_links
        if (!empty($data['variant_external_links'])) {
            $externalLinkNormalizer = new ExternalLinkNormalizer();
            foreach ($data['variant_external_links'] as $row) {
                $variant->addExternalLink($externalLinkNormalizer->denormalize($row));
            }
        }

        // attributes
        if (!empty($data['attributes'])) {
            $attributeNormalizer = new AttributeNormalizer();
            foreach ($data['attributes'] as $row) {
                $variant->addAttribute($attributeNormalizer->denormalize($row));
            }
        }

        // delivery_times
        if (!empty($data['variant_delivery_times'])) {
            $deliveryTimeNormalizer = new DeliveryTimeNormalizer();
            foreach ($data['variant_delivery_times'] as $row) {
                $variant->addDeliveryTime($deliveryTimeNormalizer->denormalize($row));
            }
        }

        return $variant;
    }
}
