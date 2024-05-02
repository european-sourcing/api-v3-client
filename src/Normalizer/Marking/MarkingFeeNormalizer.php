<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Marking;

use EuropeanSourcing\Apiv3Client\Model\Marking\MarkingFee;

class MarkingFeeNormalizer
{
    public function denormalize(array $data): MarkingFee
    {
        $markingFee = new MarkingFee();
        $markingFee->setId($data['id']);
        $markingFee->setName($data['name']);
        $markingFee->setSlug($data['slug']);

        return $markingFee;
    }
}
