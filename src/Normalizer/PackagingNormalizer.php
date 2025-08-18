<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\Packaging;

class PackagingNormalizer
{
    public function denormalize(array $data): Packaging
    {
        $packaging = new Packaging();
        $packaging->setId($data['id']);
        $packaging->setType($data['type'] ?? null);
        $packaging->setInnerQuantity($data['inner_quantity'] ?? null);
        $packaging->setWeight($data['weight'] ?? null);
        $packaging->setParentId($data['parent_id'] ?? null);

        if (!empty($data['variant_packaging_sizes'])) {
            $sizeNormalizer = new SizeNormalizer();
            foreach ($data['variant_packaging_sizes'] as $row) {
                $packaging->addSize($sizeNormalizer->denormalize($row));
            }
        }

        return $packaging;
    }
}
