<?php

namespace Medialeads\Normalizer;

use Medialeads\Apiv3Client\Model\Size;

class SizeNormalizer
{
    /**
     * @param array $data
     *
     * @return Size
     */
    public function denormalize(array $data)
    {
        $size = new Size();
        $size->setId($data['id']);
        $size->setType($data['type']);
        $size->setValue($data['value']);

        return $size;
    }
}
