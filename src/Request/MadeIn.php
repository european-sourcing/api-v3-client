<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class MadeIn extends AbstractIncludeExclude implements RequestElementInterface
{
    private array $madeIn;

    public function __construct(array $madeIn)
    {
        $this->madeIn = $madeIn;
    }

    public function export(): array
    {
        return [
            'made_in' => [
                $this->getAction() => $this->madeIn,
            ],
        ];
    }
}
