<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class SupplierProfile extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var array
     */
    private $supplierProfileIds;

    public function __construct(array $supplierProfileIds)
    {
        $this->supplierProfileIds = $supplierProfileIds;
    }

    public function export(): array
    {
        return [
            'supplier_profile_id' => [
                $this->getAction() => $this->supplierProfileIds
            ]
        ];
    }
}
