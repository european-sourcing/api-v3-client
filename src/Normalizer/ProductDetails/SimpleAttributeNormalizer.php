<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\ProductDetails;

use EuropeanSourcing\Apiv3Client\Model\ProductDetails\SimpleAttribute;
use EuropeanSourcing\Apiv3Client\Normalizer\AbstractNormalizer;

class SimpleAttributeNormalizer extends AbstractNormalizer
{
    public function denormalize(array $data): SimpleAttribute
    {
        $group = new SimpleAttribute();
        $group->setId($data['id'] ?? null);
        $group->setName($data['name']);

        return $group;
    }
}
