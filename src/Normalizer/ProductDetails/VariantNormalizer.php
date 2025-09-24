<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\ProductDetails;

use EuropeanSourcing\Apiv3Client\Model\ProductDetails\Variant;
use EuropeanSourcing\Apiv3Client\Normalizer\CarbonFootprintNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\CarbonFootprintTextileNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\DppNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\ExternalLinkNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\PackagingHierarchyNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\PriceNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\AbstractNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\SearchLight\ImageNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\SearchLight\MinimumQuantityNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\SearchLight\SupplierProfileNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\SizeNormalizer;

class VariantNormalizer extends AbstractNormalizer
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

        if (!empty($data['variant_images'])) {
            $imageNormalizer = $this->normalizerService->getNormalizer(ImageNormalizer::class);
            foreach ($data['variant_images'] as $row) {
                $image = $imageNormalizer->denormalize($row);
                if ($row['id'] == $data['main_variant_image_id']) {
                    $variant->setMainImage($image);
                } else {
                    $variant->addImage($image);
                }
            }
        }

        if (!empty($data['supplier_profiles'])) {
            $supplierProfileNormalizer = $this->normalizerService->getNormalizer(SupplierProfileNormalizer::class);
            foreach ($data['supplier_profiles'] as $row) {
                $variant->addSupplierProfile($supplierProfileNormalizer->denormalize($row));
            }
        }

        if (!empty($data['variant_sizes'])) {
            $sizeNormalizer = new SizeNormalizer();
            foreach ($data['variant_sizes'] as $row) {
                $variant->addSize($sizeNormalizer->denormalize($row));
            }
        }

        if (!empty($data['variant_packaging'])) {
            $packagingNormalizer = new PackagingHierarchyNormalizer();
            $variant->setPackaging($packagingNormalizer->denormalize($data['variant_packaging']));
        }

        if (!empty($data['variant_minimum_quantities'])) {
            $minimumQuantityNormalizer = $this->normalizerService->getNormalizer(MinimumQuantityNormalizer::class);
            foreach ($data['variant_minimum_quantities'] as $row) {
                if (empty($row['value'])) {
                    continue;
                }
                $variant->addMinimumQuantity($minimumQuantityNormalizer->denormalize($row));
            }
        }

        if (!empty($data['variant_prices'])) {
            $priceNormalizer = new PriceNormalizer();
            $lowestPrice = null;
            foreach ($data['variant_prices'] as $row) {
                $price = $priceNormalizer->denormalize($row);
                $variant->addPrice($price);

                if ((null === $lowestPrice) || ($price->getCalculationValue() < $lowestPrice->getCalculationValue())) {
                    $lowestPrice = $price;
                }
            }

            $variant->setLowestPrice($lowestPrice);
        }

        if (!empty($data['variant_sample_prices'])) {
            $priceNormalizer = new PriceNormalizer();
            foreach ($data['variant_sample_prices'] as $row) {
                $variant->addSamplePrice($priceNormalizer->denormalize($row));
            }
        }

        if (!empty($data['variant_list_prices'])) {
            $priceNormalizer = new PriceNormalizer();
            foreach ($data['variant_list_prices'] as $row) {
                $variant->addListPrice($priceNormalizer->denormalize($row));
            }
        }

        if (!empty($data['variant_external_links'])) {
            $externalLinkNormalizer = new ExternalLinkNormalizer();
            foreach ($data['variant_external_links'] as $row) {
                $variant->addExternalLink($externalLinkNormalizer->denormalize($row));
            }
        }

        return $variant;
    }
}
