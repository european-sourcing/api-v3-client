<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Aggregation;

use EuropeanSourcing\Apiv3Client\Model\Aggregation\Marking;

class MarkingNormalizer
{
    /**
     * @param array $data
     *
     * @return Marking
     */
    public function denormalize(array $data)
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
