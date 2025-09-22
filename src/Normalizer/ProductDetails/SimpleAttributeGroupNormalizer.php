<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\ProductDetails;

use EuropeanSourcing\Apiv3Client\Model\ProductDetails\SimpleAttributeGroup;
use EuropeanSourcing\Apiv3Client\Normalizer\AbstractNormalizer;

class SimpleAttributeGroupNormalizer extends AbstractNormalizer
{
    public function denormalize(array $data): SimpleAttributeGroup
    {
        $group = new SimpleAttributeGroup();
        $group->setId($data['id']);
        $group->setName($data['name']);

        $simpleAttributeNormalizer = $this->normalizerService->getNormalizer(SimpleAttributeNormalizer::class);
        foreach ($data['values'] as $value) {
            $group->addValue($simpleAttributeNormalizer->denormalize($value));
        }

        return $group;
    }
}
