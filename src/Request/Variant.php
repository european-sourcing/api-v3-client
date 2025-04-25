<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class Variant extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var array
     */
    private $variantIds;

    public function __construct(array $variantIds)
    {
        $this->variantIds = $variantIds;
    }

    public function export(): array
    {
        return [
            'variant_id' => [
                $this->getAction() => $this->variantIds
            ]
        ];
    }
}
