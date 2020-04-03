<?php

namespace Medialeads\Apiv3Client\Normalizer;

use Medialeads\Apiv3Client\Common\Collection;

class SupplierProfilesNormalizer
{
    public function denormalize(array $data): Collection
    {
        $supplierProfiles = new Collection();
        $supplierProfileNormalizer = new SupplierProfileNormalizer();

        foreach ($data as $row) {
            $supplierProfiles->add($row['id'], $supplierProfileNormalizer->denormalize($row));
        }

        return $supplierProfiles;
    }
}
