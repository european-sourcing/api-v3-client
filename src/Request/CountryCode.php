<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class CountryCode implements RequestElementInterface
{
    /**
     * @var string
     */
    private $countryCode;

    public function __construct(string $countryCode)
    {
        $this->countryCode = $countryCode;
    }

    public function export(): array
    {
        return [
            'country_code' => $this->countryCode
        ];
    }
}
