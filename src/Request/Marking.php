<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class Marking extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var array
     */
    private $markingIds;

    /**
     * @param array $markingIds
     */
    public function __construct(array $markingIds)
    {
        $this->markingIds = $markingIds;
    }

    /**
     * @return array
     */
    public function export()
    {
        return [
            'marking_id' => [
                $this->getAction() => $this->markingIds
            ]
        ];
    }
}
