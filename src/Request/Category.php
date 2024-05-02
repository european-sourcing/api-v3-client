<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class Category extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var array
     */
    private $categoryIds;

    /**
     * @param array $categoryIds
     */
    public function __construct(array $categoryIds)
    {
        $this->categoryIds = $categoryIds;
    }

    /**
     * @return array
     */
    public function export()
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
