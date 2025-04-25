<?php

namespace EuropeanSourcing\Apiv3Client\Model\Aggregation;

use EuropeanSourcing\Apiv3Client\Common\CountableAggregableInterface;

class Category implements \JsonSerializable, CountableAggregableInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $breadcrumb;

    /**
     * @var int
     */
    private $count;

    /**
     * @var Category
     */
    private $parent;

    /**
     * @var int
     */
    private $parentId;

    /**
     * @var array
     */
    private $children;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id): static
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getBreadcrumb()
    {
        return $this->breadcrumb;
    }

    /**
     * @param string $breadcrumb
     */
    public function setBreadcrumb($breadcrumb): static
    {
        $this->breadcrumb = $breadcrumb;

        return $this;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount($count): static
    {
        $this->count = $count;

        return $this;
    }

    /**
     * @return int
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @param int $parentId
     */
    public function setParentId($parentId): static
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * @return Category
     */
    public function getParent()
    {
        return $this->parent;
    }

    public function setParent(Category $parent): static
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return array
     */
    public function getChildren()
    {
        return $this->children;
    }

    public function setChildren(array $children): static
    {
        $this->children = $children;

        return $this;
    }

    public function addChildren(Category $category): static
    {
        $this->children[] = $category;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'breadcrumb' => $this->breadcrumb,
            'count' => $this->count,
            'parent_id' => $this->parentId
        ];
    }
}
