<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class SupplierProfileCountriesCodes extends AbstractIncludeExclude implements RequestElementInterface
{
    private array $supplierProfileCountriesCodes;

    /**
     * @param array<string> $countriesCodes
     */
    public function __construct(array $countriesCodes)
    {
        $this->supplierProfileCountriesCodes = $countriesCodes;
    }

    public function export(): array
    {
        return [
            'countries_supplier_profile' => [
                $this->getAction() => $this->supplierProfileCountriesCodes
            ]
        ];
    }
}
