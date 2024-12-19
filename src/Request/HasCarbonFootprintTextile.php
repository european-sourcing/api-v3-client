<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class HasCarbonFootprintTextile extends AbstractIncludeExclude implements RequestElementInterface
{
    private bool $hasCarbonFootprintTextile;

    public function __construct(bool $hasCarbonFootprintTextile)
    {
        $this->hasCarbonFootprintTextile = $hasCarbonFootprintTextile;
    }

    public function export(): array
    {
        return [
            'has_carbon_footprint_textile' => $this->hasCarbonFootprintTextile
        ];
    }
}
