<?php

namespace Medialeads\Apiv3Client\Request;

use Medialeads\Apiv3Client\Common\RequestElementInterface;

class CountryCode implements RequestElementInterface
{
    /**
     * @var string
     */
    private $countryCode;

    /**
     * @param string $countryCode
     */
    public function __construct(string $countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return array
     */
    public function export()
    {
        return [
            'country_code' => $this->countryCode
        ];
    }
}
