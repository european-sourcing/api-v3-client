<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Marking;

use EuropeanSourcing\Apiv3Client\Model\Marking\Marking;

class MarkingNormalizer
{
    public function denormalize(array $data): Marking
    {
        $marking = new Marking();
        $marking->setId($data['id']);
        $marking->setName($data['name']);
        $marking->setSlug($data['slug']);
        $marking->setFullHierarchyName($data['full_hierarchy_name']);

        if (isset($data['hierarchy'])) {
            $marking->setHierarchy($data['hierarchy']);
        }

        return $marking;
    }
}
