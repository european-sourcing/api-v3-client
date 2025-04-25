<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class CountryOfOrigin extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var array
     */
    private $countryOfOrigins;

    public function __construct(array $countryOfOrigins)
    {
        $this->countryOfOrigins = $countryOfOrigins;
    }

    public function export(): array
    {
        return [
            'country_of_origin' => [
                $this->getAction() => $this->countryOfOrigins
            ]
        ];
    }
}
