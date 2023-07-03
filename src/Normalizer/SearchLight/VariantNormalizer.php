<?php

namespace Medialeads\Apiv3Client\Normalizer\SearchLight;

use Medialeads\Apiv3Client\Model\SearchLight\Variant;

class VariantNormalizer extends AbstractSearchLightCachableNormalizer
{
    public function getNewItem($id): Variant
    {
        $variant = new Variant();

        return $variant->setId($id);
    }

    /**
     * @param array{id: int, name: string, internal_reference: string, supplier_reference: string, stock: int, supplier_profiles: array, main_variant_image: array, variant_minimum_quantities: array} $data
     */
    public function denormalize(array $data): Variant
    {
        /** @var Variant $variant */
        $variant = $this->getCache($data['id']);
        $variant->setName($data['name']);
        $variant->setInternalReference($data['internal_reference']);
        $variant->setSupplierReference($data['supplier_reference']);
        $variant->setStock($data['stock']);

        if (false === empty($data['supplier_profiles'])) {
            /** @var SupplierProfileNormalizer $supplierProfileNormalizer */
            $supplierProfileNormalizer = $this->normalizerService->getNormalizer(SupplierProfileNormalizer::class);
            foreach ($data['supplier_profiles'] as $row) {
                $variant->addSupplierProfile($supplierProfileNormalizer->denormalize($row));
            }
        }

        if (false === empty($data['main_variant_image'])) {
            /** @var ImageNormalizer $imageNormalizer */
            $imageNormalizer = $this->normalizerService->getNormalizer(ImageNormalizer::class);
            $variant->setMainImage($imageNormalizer->denormalize($data['main_variant_image']));
        }

        if (false === empty($data['variant_minimum_quantities'])) {
            /** @var MinimumQuantityNormalizer $minimumQuantityNormalizer */
            $minimumQuantityNormalizer = $this->normalizerService->getNormalizer(MinimumQuantityNormalizer::class);
            foreach ($data['variant_minimum_quantities'] as $row) {
                $variant->addMinimumQuantity($minimumQuantityNormalizer->denormalize($row));
            }
        }

        return $variant;
    }
}
