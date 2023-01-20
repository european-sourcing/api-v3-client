<?php

namespace Medialeads\Apiv3Client\Request;

use Medialeads\Apiv3Client\Common\RequestElementInterface;

class SupplierProfileCountryCode implements RequestElementInterface
{
    private string $countryCode;

    public function __construct(string $countryCode)
    {
        $this->countryCode = $countryCode;
    }

    public function export(): array
    {
        return [
            'country_supplier_profile' => $this->countryCode
        ];
    }
}
