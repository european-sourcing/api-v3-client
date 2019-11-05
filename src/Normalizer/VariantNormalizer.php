<?php

namespace Medialeads\Apiv3Client\Normalizer;

use Medialeads\Apiv3Client\Model\Price;
use Medialeads\Apiv3Client\Model\Variant;

class VariantNormalizer
{
    /**
     * @param array $data
     *
     * @return Variant
     */
    public function denormalize(array $data)
    {
        $variant = new Variant();
        $variant->setId($data['id']);
        $variant->setName($data['name']);
        $variant->setSlug($data['slug']);
        $variant->setDescription($data['description']);
        $variant->setRawDescription($data['raw_description']);
        $variant->setSupplierReference($data['supplier_reference']);
        $variant->setStock($data['stock']);
        $variant->setMarkingAdditionalInformation($data['marking_additional_information']);
        $variant->setNetWeight($data['net_weight']);
        $variant->setGrossWeight($data['gross_weight']);
        $variant->setEuropeanArticleNumbering($data['european_article_numbering']);
        $variant->setMandatoryMarking($data['mandatory_marking']);

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
        if (!empty($data['minimum_quantities'])) {
            $minimumQuantityNormalizer = new MinimumQuantityNormalizer();
            foreach ($data['minimum_quantities'] as $row) {
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

            $variant->setLowestPrice($price);
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
