<?php

namespace Medialeads\Apiv3Client\Normalizer\Aggregation;

use Medialeads\Apiv3Client\Model\Aggregation\Aggregation;
use Medialeads\Apiv3Client\Model\Aggregation\Category;

class CategoriesNormalizer
{
    /**
     * @param array $data
     *
     * @return array
     */
    public function denormalize(array $data)
    {
        $categories = [];
        $categoryNormalizer = new CategoryNormalizer();

        foreach ($data as $row) {
            $categories[$row['id']] = $categoryNormalizer->denormalize($row);
        }

        // parent / children
        /** @var Category $category */
        foreach ($categories as &$category) {
            if (null !== $category->getParentId()) {
                /** @var Category $parent */
                $parent = $categories[$category->getParentId()];
                $category->setParent($parent);
                $parent->addChildren($category);
            }
        }

        $aggreation = new Aggregation('categories');
        $aggreation->setRows(array_values($categories));

        return $aggreation;
    }
}
