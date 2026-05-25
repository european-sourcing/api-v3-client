<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\MarkingLight;

use EuropeanSourcing\Apiv3Client\Model\MarkingLight\Marking;
use EuropeanSourcing\Apiv3Client\Normalizer\AbstractCachableNormalizer;

class MarkingNormalizer extends AbstractCachableNormalizer
{
    protected function getNewItem($id): Marking
    {
        $marking = new Marking();

        return $marking->setId($id);
    }

    public function denormalize(array $data): Marking
    {
        /** @var Marking $marking */
        $marking = $this->getCache($data['id']);
        $marking->setName($data['name']);

        return $marking;
    }
}
