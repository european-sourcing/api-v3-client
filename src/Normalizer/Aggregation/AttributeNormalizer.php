<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Aggregation;

use EuropeanSourcing\Apiv3Client\Model\Aggregation\Attribute;

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
        $attribute->setGroupId($data['group_id']);
        $attribute->setGroupName($data['group_name']);
        $attribute->setCount($data['count']);

        return $attribute;
    }
}
