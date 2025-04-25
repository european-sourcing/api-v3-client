<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\Label;

class LabelNormalizer
{
    public function denormalize(array $data): Label
    {
        $label = new Label();
        $label->setId($data['id']);
        $label->setName($data['name']);
        $label->setSlug($data['slug']);

        return $label;
    }
}
