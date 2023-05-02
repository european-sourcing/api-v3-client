<?php

namespace Medialeads\Apiv3Client\Normalizer\SearchLight;

use Medialeads\Apiv3Client\Model\SearchLight\Supplier;

class SupplierNormalizer extends AbstractSearchLightCachableNormalizer
{
    protected function getNewItem($id): Supplier
    {
        $supplier = new Supplier();

        return $supplier->setId($id);
    }

    /**
     * @param array{id: int, name: string, legal_name: string, supplier_profiles: array} $data
     */
    public function denormalize(array $data): Supplier
    {
        /** @var Supplier $supplier */
        $supplier = $this->getCache($data['id']);
        $supplier->setName($data['name']);
        $supplier->setLegalName($data['legal_name']);

        if (false === empty($data['supplier_profiles'])) {
            /** @var SupplierProfileNormalizer $supplierProfileNormalizer */
            $supplierProfileNormalizer = $this->normalizerService->getNormalizer(SupplierProfileNormalizer::class);
            foreach ($data['supplier_profiles'] as $row) {
                $supplier->addSupplierProfile($supplierProfileNormalizer->denormalize($row));
            }
        }

        return $supplier;
    }
}
