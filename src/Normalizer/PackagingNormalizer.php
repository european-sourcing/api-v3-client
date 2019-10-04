<?php

namespace Medialeads\Normalizer;

use Medialeads\Apiv3Client\Model\Packaging;

class PackagingNormalizer
{
    /**
     * @param array $data
     *
     * @return Packaging
     */
    public function denormalize(array $data)
    {
        $packaging = new Packaging();
        $packaging->setId($data['id']);
        $packaging->setType($data['type']);
        $packaging->setInnerQuantity($data['inner_quantity']);
        $packaging->setWeight($data['weight']);
        $packaging->setParentId($data['parent_id']);

        if (!empty($data['variant_packaging_sizes'])) {
            $sizeNormalizer = new SizeNormalizer();
            foreach ($data['variant_packaging_sizes'] as $row) {
                $packaging->addSize($sizeNormalizer->denormalize($row));
            }
        }

        return $packaging;
    }
}
