<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\Packaging;

class PackagingHierarchyNormalizer
{
    public function denormalize(array $data)
    {
        $packagingNormalizer = new PackagingNormalizer();

        $firstPackaging = $packagingNormalizer->denormalize($data);

        $parents = [];
        if (!empty($data['hierarchy'])) {
            foreach ($data['hierarchy'] as $row) {
                $parents[$row['id']] = $packagingNormalizer->denormalize($row);
            }
        }

        // parents
        foreach ($parents as &$packaging) {
            if (null !== $packaging->getParentId()) {
                /** @var Packaging $parent */
                $parent = $parents[$packaging->getParentId()];
                $packaging->setParent($parent);
            }
        }

        // set parent of first packaging
        if (isset($parents[$firstPackaging->getParentId()])) {
            $firstPackaging->setParent($parents[$firstPackaging->getParentId()]);
        }

        return $firstPackaging;
    }
}
