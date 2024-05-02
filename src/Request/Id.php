<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class Id extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var array
     */
    private $ids;

    /**
     * @param array $ids
     */
    public function __construct(array $ids)
    {
        $this->ids = $ids;
    }

    /**
     * @return array
     */
    public function export()
    {
        return [
            'id' => [
                $this->getAction() => $this->ids
            ]
        ];
    }
}
