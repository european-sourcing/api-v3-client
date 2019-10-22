<?php

namespace Medialeads\Apiv3Client\Request;

use Medialeads\Apiv3Client\Common\RequestElementInterface;

class CountryOfOrigin extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var array
     */
    private $countryOfOrigins;

    /**
     * @param array $countryOfOrigins
     */
    public function __construct(array $countryOfOrigins)
    {
        $this->countryOfOrigins = $countryOfOrigins;
    }

    /**
     * @return array
     */
    public function export()
    {
        return [
            'country_of_origin' => [
                $this->getAction() => $this->countryOfOrigins
            ]
        ];
    }
}
