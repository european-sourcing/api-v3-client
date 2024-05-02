<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Common\Collection;

class SuppliersNormalizer
{
    public function denormalize(array $data): Collection
    {
        $suppliers = new Collection();
        $supplierNormalizer = new SupplierNormalizer();

        foreach ($data as $row) {
            $suppliers->add($row['id'], $supplierNormalizer->denormalize($row));
        }

        return $suppliers;
    }
}
