<?php

namespace Medialeads\Normalizer;

use Medialeads\Apiv3Client\Model\Category;

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
        $category->setBreadcrumb($data['breadcrumb']);
        $category->setParentId($data['parent_id']);

        if (isset($data['count'])) {
            $category->setCount($data['count']);
        }

        return $category;
    }
}
