<?php

namespace Medialeads\Apiv3Client\Normalizer;

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
        $category->setBreadcrumb($data['full_hierarchy_name']);
        $category->setParentId($data['parent_id']);

        return $category;
    }
}
