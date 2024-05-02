<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class Variant extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var array
     */
    private $variantIds;

    /**
     * @param array $variantIds
     */
    public function __construct(array $variantIds)
    {
        $this->variantIds = $variantIds;
    }

    /**
     * @return array
     */
    public function export()
    {
        return [
            'variant_id' => [
                $this->getAction() => $this->variantIds
            ]
        ];
    }
}
