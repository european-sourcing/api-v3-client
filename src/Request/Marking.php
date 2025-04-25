<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class Marking extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var array
     */
    private $markingIds;

    public function __construct(array $markingIds)
    {
        $this->markingIds = $markingIds;
    }

    public function export(): array
    {
        return [
            'marking_id' => [
                $this->getAction() => $this->markingIds
            ]
        ];
    }
}
