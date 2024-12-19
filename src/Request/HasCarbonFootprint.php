<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class HasCarbonFootprint extends AbstractIncludeExclude implements RequestElementInterface
{
    private bool $hasCarbonFootprint;

    public function __construct(bool $hasCarbonFootprint)
    {
        $this->hasCarbonFootprint = $hasCarbonFootprint;
    }

    public function export(): array
    {
        return [
            'has_carbon_footprint' => $this->hasCarbonFootprint
        ];
    }
}
