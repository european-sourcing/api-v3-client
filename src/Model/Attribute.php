<?php

namespace EuropeanSourcing\Apiv3Client\Model;

class Attribute implements \JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $fullHierarchyValue;

    private ?Attribute $parent = null;

    /**
     * @var AttributeGroup
     */
    private $group;

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value): static
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return string
     */
    public function getFullHierarchyValue()
    {
        return $this->fullHierarchyValue;
    }

    /**
     * @param string $fullHierarchyValue
     */
    public function setFullHierarchyValue($fullHierarchyValue): static
    {
        $this->fullHierarchyValue = $fullHierarchyValue;

        return $this;
    }

    public function getParent(): ?Attribute
    {
        return $this->parent;
    }

    public function setParent(?Attribute $parent): static
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return AttributeGroup
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param AttributeGroup $group
     */
    public function setGroup($group): static
    {
        $this->group = $group;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'value' => $this->value,
            'slug' => $this->slug,
            'full_hierarchy_value' => $this->fullHierarchyValue,
            'parent' => $this->parent,
            'group' => $this->group
        ];
    }
}
