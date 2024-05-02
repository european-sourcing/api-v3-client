<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\AttributeGroup;

class AttributeGroupNormalizer
{
    /**
     * @param array $data
     *
     * @return AttributeGroup
     */
    public function denormalize(array $data)
    {
        $group = new AttributeGroup();
        $group->setId($data['id']);
        $group->setName($data['name']);
        $group->setSlug($data['slug']);

        return $group;
    }
}
