<?php

namespace Medialeads\Normalizer;

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
        $attribute->setId($attribute['id']);
        $attribute->setValue($attribute['value']);
        $attribute->setType($attribute['type']);
        $attribute->setSlug($attribute['slug']);
        $attribute->setAdditionalTextData($attribute['additional_text_data']);
        $attribute->setFullHierarchyValue($attribute['full_hierarchy_value']);

        if (!empty($data['parent'])) {
            $parent = $this->denormalize($attribute['parent']);
            $attribute->setParent($parent);
        }

        $attributeGroupDenormalizer = new AttributeGroupNormalizer();
        $attribute->setGroup($attributeGroupDenormalizer->denormalize($attribute['attribute_group']));

        return $attribute;
    }
}
