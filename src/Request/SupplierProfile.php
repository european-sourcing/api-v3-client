<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class SupplierProfile extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var array
     */
    private $supplierProfileIds;

    /**
     * @param array $supplierProfileIds
     */
    public function __construct(array $supplierProfileIds)
    {
        $this->supplierProfileIds = $supplierProfileIds;
    }

    /**
     * @return array
     */
    public function export()
    {
        return [
            'supplier_profile_id' => [
                $this->getAction() => $this->supplierProfileIds
            ]
        ];
    }
}
