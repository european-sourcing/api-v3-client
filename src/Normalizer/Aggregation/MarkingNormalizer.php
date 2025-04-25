<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Aggregation;

use EuropeanSourcing\Apiv3Client\Model\Aggregation\Marking;

class MarkingNormalizer
{
    public function denormalize(array $data): Marking
    {
        $marking = new Marking();
        $marking->setId($data['id']);
        $marking->setName($data['name']);
        $marking->setSlug($data['slug']);

        if (isset($data['count'])) {
            $marking->setCount($data['count']);
        }

        return $marking;
    }
}
