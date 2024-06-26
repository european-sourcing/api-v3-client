<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Aggregation;

use EuropeanSourcing\Apiv3Client\Model\Aggregation\Supplier;

class SupplierNormalizer
{
    /**
     * @param array $data
     *
     * @return Supplier
     */
    public function denormalize(array $data)
    {
        $supplier = new Supplier();
        $supplier->setId($data['id']);
        $supplier->setName($data['name']);
        $supplier->setCount($data['count']);

        return $supplier;
    }
}
