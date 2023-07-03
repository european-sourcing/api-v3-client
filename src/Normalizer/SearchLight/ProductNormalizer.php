<?php

namespace Medialeads\Apiv3Client\Normalizer\SearchLight;

use Exception;
use Medialeads\Apiv3Client\Model\SearchLight\Product;

class ProductNormalizer extends AbstractSearchLightCachableNormalizer
{
    protected function getNewItem($id): Product
    {
        $product = new Product();

        return $product->setId($id);
    }

    /**
     * @param array{id: int, internal_reference: string, has_marking: bool, supplier: array, best_variant: array, extremum_price: array, brand: array} $data
     * @throws Exception
     */
    public function denormalize(array $data): Product
    {
        /** @var Product $product */
        $product = $this->getCache($data['id']);
        $product->setInternalReference($data['internal_reference']);
        $product->setHasMarking($data['has_marking']);

        /** @var VariantNormalizer $variantNormalizer */
        $variantNormalizer = $this->normalizerService->getNormalizer(VariantNormalizer::class);
        $product->setBestVariant($variantNormalizer->denormalize($data['best_variant']));
        $product->getBestVariant()->setProduct($product);

        /** @var SupplierNormalizer $supplierNormalizer */
        $supplierNormalizer = $this->normalizerService->getNormalizer(SupplierNormalizer::class);
        $product->setSupplier($supplierNormalizer->denormalize($data['supplier']));

        if (false === empty($data['extremum_price'])) {
            /** @var ExtremumPriceNormalizer $extremumPriceNormalizer */
            $extremumPriceNormalizer = $this->normalizerService->getNormalizer(ExtremumPriceNormalizer::class);
            foreach ($data['extremum_price'] as $row) {
                $product->addExtremumPrice($extremumPriceNormalizer->denormalize($row));
            }
        }

        if (false === empty($data['brand'])) {
            /** @var BrandNormalizer $brandNormalizer */
            $brandNormalizer = $this->normalizerService->getNormalizer(BrandNormalizer::class);
            $product->setBrand($brandNormalizer->denormalize($data['brand']));
        }

        return $product;
    }
}
