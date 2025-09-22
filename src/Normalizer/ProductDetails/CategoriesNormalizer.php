<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\ProductDetails;


use EuropeanSourcing\Apiv3Client\Model\ProductDetails\Category;
use EuropeanSourcing\Apiv3Client\Normalizer\AbstractNormalizer;

class CategoriesNormalizer extends AbstractNormalizer
{
    /**
     * @return array<Category>
     */
    public function denormalize(array $data): array
    {
        $categoryNormalizer = $this->normalizerService->getNormalizer(CategoryNormalizer::class);

        /** @var array<Category> $categories */
        $categories = [];
        foreach ($data as $row) {
            $category = $categoryNormalizer->denormalize($row);
            $categories[$category->getId()] = $category;
        }

        foreach ($categories as $category) {
            if (null !== $category->getParentId()) {
                $parent = $categories[$category->getParentId()];
                $category->setParent($parent);
                $parent->addChildren($category);
            }
        }

        return array_values($categories);
    }
}
