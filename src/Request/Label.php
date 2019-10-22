<?php

namespace Medialeads\Apiv3Client\Request;

use Medialeads\Apiv3Client\Common\RequestElementInterface;

class Label extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var array
     */
    private $labelIds;

    /**
     * @param array $labelIds
     */
    public function __construct(array $labelIds)
    {
        $this->labelIds = $labelIds;
    }

    /**
     * @return array
     */
    public function export()
    {
        return [
            'label_id' => [
                $this->getAction() => $this->labelIds
            ]
        ];
    }
}
