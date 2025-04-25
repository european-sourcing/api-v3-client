<?php

namespace EuropeanSourcing\Apiv3Client\Model;

class Packaging implements \JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $innerQuantity;

    /**
     * @var Packaging
     */
    private $parent;

    /**
     * @var int
     */
    private $parentId;

    /**
     * @var string
     */
    private $type;

    /**
     * @var float
     */
    private $weight;

    /**
     * @var array
     */
    private $sizes;

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
     * @return int
     */
    public function getInnerQuantity()
    {
        return $this->innerQuantity;
    }

    /**
     * @param int $innerQuantity
     */
    public function setInnerQuantity($innerQuantity): static
    {
        $this->innerQuantity = $innerQuantity;

        return $this;
    }

    /**
     * @return Packaging
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Packaging $parent
     */
    public function setParent($parent): static
    {
        $this->parent = $parent;

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
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight($weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return array
     */
    public function getSizes()
    {
        return $this->sizes;
    }

    /**
     * @param array $sizes
     */
    public function setSizes($sizes): static
    {
        $this->sizes = $sizes;

        return $this;
    }

    public function addSize(Size $size): static
    {
        $this->sizes[] = $size;

        return $this;
    }

    /**
     * @return string
     */
    public function getFormatedSizes()
    {
        $values = array_map(function(Size $size) {
            return round($size->getValue(), 2);
        }, $this->sizes);

        return implode(' x ', $values);
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'inner_quantity' => $this->innerQuantity,
            'type' => $this->type,
            'weight' => $this->weight,
            'sizes' => $this->sizes,
            'parent' => $this->parent
        ];
    }
}
