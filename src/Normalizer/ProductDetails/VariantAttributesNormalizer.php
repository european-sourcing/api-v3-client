<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\ProductDetails;

use EuropeanSourcing\Apiv3Client\Model\ProductDetails\VariantAttributes;
use EuropeanSourcing\Apiv3Client\Normalizer\AbstractNormalizer;

class VariantAttributesNormalizer extends AbstractNormalizer
{
    public function denormalize(array $data): VariantAttributes
    {
        $variantAttributes = new VariantAttributes();
        $variantAttributes->setId($data['id']);
        $variantAttributes->setInternalReference($data['internal_reference']);
        $variantAttributes->setAttributes($data['attributes'] ?? []);

        return $variantAttributes;
    }
}
