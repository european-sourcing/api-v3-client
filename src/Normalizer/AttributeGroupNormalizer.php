<?php

namespace Medialeads\Apiv3Client\Normalizer;

use Medialeads\Apiv3Client\Model\AttributeGroup;

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
