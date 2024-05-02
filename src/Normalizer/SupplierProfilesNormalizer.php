<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Common\Collection;

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
