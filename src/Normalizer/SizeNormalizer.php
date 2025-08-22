<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\Size;

class SizeNormalizer
{
    public function denormalize(array $data): Size
    {
        $size = new Size();
        $size->setId($data['id']);
        $size->setType($data['type'] ?? null);
        $size->setValue($data['value']);

        return $size;
    }
}
