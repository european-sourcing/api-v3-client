<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Aggregation;

use EuropeanSourcing\Apiv3Client\Model\Aggregation\Category;

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
        $category->setCount($data['count']);

        if (isset($data['parent'])) {
            $category->setParentId($data['parent']);
        }

        return $category;
    }
}
