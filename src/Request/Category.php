<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class Category extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var array
     */
    private $categoryIds;

    public function __construct(array $categoryIds)
    {
        $this->categoryIds = $categoryIds;
    }

    public function export(): array
    {
        return [
            'category_id' => [
                $this->getAction() => [
                    'ids' => $this->categoryIds
                ]
            ]
        ];
    }
}
