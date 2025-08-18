<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\Category;

class CategoryNormalizer
{
    public function denormalize(array $data): Category
    {
        $category = new Category();
        $category->setId($data['id']);
        $category->setName($data['name']);
        $category->setBreadcrumb($data['full_hierarchy_name']);
        $category->setParentId($data['parent_id'] ?? null);

        return $category;
    }
}
