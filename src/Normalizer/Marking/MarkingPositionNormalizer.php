<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Marking;

use EuropeanSourcing\Apiv3Client\Model\Marking\MarkingPosition;

class MarkingPositionNormalizer
{
    public function denormalizer(array $data): MarkingPosition
    {
        $markingPosition = new MarkingPosition();
        $markingPosition->setId($data['id']);
        $markingPosition->setName($data['name']);
        $markingPosition->setSlug($data['slug']);

        return $markingPosition;
    }
}
