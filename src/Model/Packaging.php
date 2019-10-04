<?php

namespace Medialeads\Apiv3Client\Model;

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
     *
     * @return Packaging
     */
    public function setId($id)
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
     *
     * @return Packaging
     */
    public function setInnerQuantity($innerQuantity)
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
     *
     * @return Packaging
     */
    public function setParent($parent)
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
     *
     * @return Packaging
     */
    public function setParentId($parentId)
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
     *
     * @return Packaging
     */
    public function setType($type)
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
     *
     * @return Packaging
     */
    public function setWeight($weight)
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
     *
     * @return Packaging
     */
    public function setSizes($sizes)
    {
        $this->sizes = $sizes;

        return $this;
    }

    /**
     * @param Size $size
     *
     * @return Packaging
     */
    public function addSize(Size $size)
    {
        $this->sizes[] = $size;

        return $this;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
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
