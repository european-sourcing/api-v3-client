<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Marking;

use EuropeanSourcing\Apiv3Client\Model\Marking\SupplierOptionTranslation;

class SupplierOptionTranslationNormalizer
{
    public function denormalize(array $data): SupplierOptionTranslation
    {
        $supplierOptionTranslation = new SupplierOptionTranslation();
        $supplierOptionTranslation->setLang($data['lang']);
        $supplierOptionTranslation->setName($data['name']);
        $supplierOptionTranslation->setComment($data['comment'] ?? null);

        return $supplierOptionTranslation;
    }
}
