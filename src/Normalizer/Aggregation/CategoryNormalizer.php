<?php

namespace Medialeads\Apiv3Client\Normalizer\Aggregation;

use Medialeads\Apiv3Client\Model\Aggregation\Category;

class CategoryNormalizer
{
    /**
     * @param array $data
     *
     * @return Category
     */
    public function denormalize(array $data)
    {
        $category = new Category();
        $category->setId($data['id']);
        $category->setName($data['name']);
        $category->setBreadcrumb($data['full_hierarchy_name']);
        $category->setParentId($data['parent']);
        $category->setCount($data['count']);

        return $category;
    }
}
