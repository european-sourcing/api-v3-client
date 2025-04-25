<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\Attribute;

class AttributeNormalizer
{
    public function denormalize(array $data): Attribute
    {
        $attribute = new Attribute();
        $attribute->setId($data['id']);
        $attribute->setValue($data['value']);
        $attribute->setType($data['type']);
        $attribute->setSlug($data['slug']);
        $attribute->setFullHierarchyValue($data['full_hierarchy_value']);

        if (!empty($data['parent'])) {
            $parent = $this->denormalize($data['parent']);
            $attribute->setParent($parent);
        }

        $attributeGroupDenormalizer = new AttributeGroupNormalizer();
        $attribute->setGroup($attributeGroupDenormalizer->denormalize($data['attribute_group']));

        return $attribute;
    }
}
