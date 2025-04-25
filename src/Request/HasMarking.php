<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class HasMarking extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var bool
     */
    private $hasMarking;

    public function __construct(bool $hasMarking)
    {
        $this->hasMarking = $hasMarking;
    }

    public function export(): array
    {
        return [
            'has_marking' => $this->hasMarking
        ];
    }
}
