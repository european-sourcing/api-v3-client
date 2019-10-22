<?php

namespace Medialeads\Apiv3Client\Request;

use Medialeads\Apiv3Client\Common\RequestElementInterface;

class HasMarking extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var bool
     */
    private $hasMarking;

    /**
     * @param bool $hasMarking
     */
    public function __construct(bool $hasMarking)
    {
        $this->hasMarking = $hasMarking;
    }

    /**
     * @return array
     */
    public function export()
    {
        return [
            'has_marking' => $this->hasMarking
        ];
    }
}
