<?php

namespace Medialeads\Apiv3Client\Normalizer;

use Medialeads\Apiv3Client\Model\Attribute;

class AttributeNormalizer
{
    /**
     * @param array $data
     *
     * @return Attribute
     */
    public function denormalize(array $data)
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
