<?php

namespace Medialeads\Apiv3Client\Request;

use Medialeads\Apiv3Client\Common\RequestElementInterface;

class Brand extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var array
     */
    private $brandIds;

    /**
     * @param array $brandIds
     */
    public function __construct(array $brandIds)
    {
        $this->brandIds = $brandIds;
    }

    /**
     * @return array
     */
    public function export()
    {
        return [
            'brand_id' => [
                $this->getAction() => $this->brandIds
            ]
        ];
    }
}
