<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\AttributeGroup;

class AttributeGroupNormalizer
{
    public function denormalize(array $data): AttributeGroup
    {
        $group = new AttributeGroup();
        $group->setId($data['id']);
        $group->setName($data['name']);
        $group->setSlug($data['slug']);

        return $group;
    }
}
