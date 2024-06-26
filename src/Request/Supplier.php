<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class Supplier extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var array
     */
    private $supplierIds;

    /**
     * @param array $supplierIds
     */
    public function __construct(array $supplierIds)
    {
        $this->supplierIds = $supplierIds;
    }

    /**
     * @return array
     */
    public function export()
    {
        return [
            'supplier_id' => [
                $this->getAction() => $this->supplierIds
            ]
        ];
    }
}
