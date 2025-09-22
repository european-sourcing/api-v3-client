<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\ProductDetails;

use EuropeanSourcing\Apiv3Client\Model\ProductDetails\MultipleAttributeGroup;
use EuropeanSourcing\Apiv3Client\Model\ProductDetails\Product;
use EuropeanSourcing\Apiv3Client\Model\ProductDetails\VariantAttributeGroup;
use EuropeanSourcing\Apiv3Client\Normalizer\AbstractNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\BrandNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\SearchLight\ExtremumPriceNormalizer;

class ProductNormalizer extends AbstractNormalizer
{
    public function denormalize(array $data): Product
    {
        $product = new Product();
        $product->setSupplierBaseReference($data['supplier_base_reference']);
        $product->setInternalReference($data['internal_reference']);
        $product->setCountryOfOrigin($data['country_of_origin'] ?? null);
        $product->setUnionCustomsCode($data['union_customs_code'] ?? null);
        $product->setHasMarking($data['has_marking']);

        $variantNormalizer = $this->normalizerService->getNormalizer(VariantNormalizer::class);
        $bestVariant = $variantNormalizer->denormalize($data['best_variant']);
        $product->setBestVariant($bestVariant);
        $product->getBestVariant()->setProduct($product);

        $multipleGroupNormalizer = $this->normalizerService->getNormalizer(MultipleAttributeGroupNormalizer::class);
        $simpleGroupNormalizer = $this->normalizerService->getNormalizer(SimpleAttributeGroupNormalizer::class);
        foreach ($data['attributeMatrix']['attributeGroups'] ?? [] as $row) {
            if ($row['type'] === 'multiple') {
                $group = $multipleGroupNormalizer->denormalize($row);
            } else {
                $group = $simpleGroupNormalizer->denormalize($row);
            }
            $product->addAttributeGroup($group);
        }

        $variantAttributesNormalizer = $this->normalizerService->getNormalizer(VariantAttributesNormalizer::class);
        foreach ($data['attributeMatrix']['variantsAttributes'] as $row) {
            $product->addVariantAttributes($variantAttributesNormalizer->denormalize($row));
        }

        $attributeGroups = $product->getAttributeGroups();
        $variantsAttributes = $product->getVariantsAttributes();
        $bestVariantAttributes = $variantsAttributes[$bestVariant->getId()]->getAttributes();
        foreach ($attributeGroups as $attributeGroup) {
            if (array_key_exists($attributeGroup->getId(), $bestVariantAttributes)) {
                $id = implode('_', $bestVariantAttributes[$attributeGroup->getId()]);
            } else {
                $id = '';
            }

            $variantAttributeGroup = new VariantAttributeGroup();
            $variantAttributeGroup->setId($attributeGroup->getId());
            $variantAttributeGroup->setName($attributeGroup->getName());
            if ($attributeGroup instanceof MultipleAttributeGroup) {
                $variantAttributeGroup->setAdditionalTextDataType($attributeGroup->getAdditionalTextDataType());
            }
            $variantAttributeGroup->setValue($attributeGroup->getValues()[$id]);

            $bestVariant->addAttributeGroup($variantAttributeGroup);
        }

        if (false === empty($data['extremum_price'])) {
            $extremumPriceNormalizer = $this->normalizerService->getNormalizer(ExtremumPriceNormalizer::class);
            foreach ($data['extremum_price'] as $row) {
                $product->addExtremumPrice($extremumPriceNormalizer->denormalize($row));
            }
        }

        if (false === empty($data['brand'])) {
            $brandNormalizer = $this->normalizerService->getNormalizer(BrandNormalizer::class);
            $product->setBrand($brandNormalizer->denormalize($data['brand']));
        }

        if (!empty($data['categories'])) {
            $categoriesNormalizer = $this->normalizerService->getNormalizer(CategoriesNormalizer::class);
            $product->setCategories($categoriesNormalizer->denormalize($data['categories']));

            foreach ($product->getCategories() as $category) {
                if ($category->getId() == $data['main_category_id']) {
                    $product->setMainCategory($category);
                }
            }
        }

        return $product;
    }
}
