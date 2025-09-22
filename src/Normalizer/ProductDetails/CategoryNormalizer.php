<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\ProductDetails;


use EuropeanSourcing\Apiv3Client\Model\ProductDetails\Category;
use EuropeanSourcing\Apiv3Client\Normalizer\AbstractNormalizer;

class CategoryNormalizer extends AbstractNormalizer
{
    public function denormalize(array $data): Category
    {
        $category = new Category();
        $category->setId($data['id']);
        $category->setName($data['name']);
        $category->setParentId($data['parent_id'] ?? null);

        return $category;
    }
}
