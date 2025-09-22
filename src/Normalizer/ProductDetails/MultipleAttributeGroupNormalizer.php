<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\ProductDetails;

use EuropeanSourcing\Apiv3Client\Model\ProductDetails\MultipleAttributeGroup;
use EuropeanSourcing\Apiv3Client\Normalizer\AbstractNormalizer;

class MultipleAttributeGroupNormalizer extends AbstractNormalizer
{
    public function denormalize(array $data): MultipleAttributeGroup
    {
        $group = new MultipleAttributeGroup();
        $group->setId($data['id']);
        $group->setName($data['name']);
        $group->setAdditionalTextDataType($data['additional_text_data_type'] ?? null);

        $multipleAttributeNormalizer = $this->normalizerService->getNormalizer(MultipleAttributeNormalizer::class);
        foreach ($data['values'] as $value) {
            $group->addValue($multipleAttributeNormalizer->denormalize($value));
        }

        return $group;
    }
}
