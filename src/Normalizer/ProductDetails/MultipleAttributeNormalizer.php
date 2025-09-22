<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\ProductDetails;

use EuropeanSourcing\Apiv3Client\Model\ProductDetails\MultipleAttribute;
use EuropeanSourcing\Apiv3Client\Normalizer\AbstractNormalizer;

class MultipleAttributeNormalizer extends AbstractNormalizer
{
    public function denormalize(array $data): MultipleAttribute
    {
        $group = new MultipleAttribute();
        $group->setIds($data['ids'] ?? null);
        $group->setName($data['name']);
        $group->setAdditionalTextData($data['additional_text_data_type'] ?? null);

        return $group;
    }
}
