<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Aggregation;

use EuropeanSourcing\Apiv3Client\Model\Aggregation\Supplier;

class SupplierNormalizer
{
    public function denormalize(array $data): Supplier
    {
        $supplier = new Supplier();
        $supplier->setId($data['id']);
        $supplier->setName($data['name']);
        $supplier->setCount($data['count']);

        return $supplier;
    }
}
