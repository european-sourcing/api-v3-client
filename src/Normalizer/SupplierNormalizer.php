<?php

namespace Medialeads\Apiv3Client\Normalizer;


use Medialeads\Apiv3Client\Model\Supplier;

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
        $supplier->setSlug($data['slug']);

        if (isset($data['legal_name'])) {
            $supplier->setLegalName($data['legal_name']);
        }

        if (isset($data['count'])) {
            $supplier->setCount($data['count']);
        }

        if (!empty($data['supplier_profiles'])) {
            $supplierProfileNormalizer = new SupplierProfileNormalizer();
            foreach ($data['supplier_profiles'] as $row) {
                $supplier->addSupplierProfile($supplierProfileNormalizer->denormalize($row));
            }
        }

        if (!empty($data['contacts'])) {
            $supplierContactNormalizer = new SupplierContactNormalizer();
            foreach ($data['contacts'] as $row) {
                $supplier->addSupplierContact($supplierContactNormalizer->denormalize($row));
            }
        }

        return $supplier;
    }
}
