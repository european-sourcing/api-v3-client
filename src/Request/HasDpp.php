<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class HasDpp extends AbstractIncludeExclude implements RequestElementInterface
{
    private bool $dpp;

    public function __construct(bool $dpp)
    {
        $this->dpp = $dpp;
    }

    public function export(): array
    {
        return [
            'has_dpp' => $this->dpp
        ];
    }
}
