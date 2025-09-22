<?php

namespace EuropeanSourcing\Apiv3Client\Model\ProductDetails;

class Category
{
    private int $id;

    private string $name;

    private ?int $parentId = null;

    private ?self $parent = null;

    /** @var array<self> */
    private array $children = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function setParentId(?int $parentId): self
    {
        $this->parentId = $parentId;

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return array<self>
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * @param array<self> $children
     */
    public function setChildren(array $children): self
    {
        $this->children = $children;

        return $this;
    }

    public function addChildren(self $children): self
    {
        $this->children[] = $children;

        return $this;
    }
}
