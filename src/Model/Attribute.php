<?php

namespace Medialeads\Apiv3Client\Model;

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
    private $additionalTextData;

    /**
     * @var string
     */
    private $fullHierarchyValue;

    /**
     * @var Attribute
     */
    private $parent;

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
     *
     * @return Attribute
     */
    public function setId($id)
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
     *
     * @return Attribute
     */
    public function setType($type)
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
     *
     * @return Attribute
     */
    public function setValue($value)
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
     *
     * @return Attribute
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return string
     */
    public function getAdditionalTextData()
    {
        return $this->additionalTextData;
    }

    /**
     * @param string $additionalTextData
     *
     * @return Attribute
     */
    public function setAdditionalTextData($additionalTextData)
    {
        $this->additionalTextData = $additionalTextData;

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
     *
     * @return Attribute
     */
    public function setFullHierarchyValue($fullHierarchyValue)
    {
        $this->fullHierarchyValue = $fullHierarchyValue;

        return $this;
    }

    /**
     * @return Attribute
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Attribute $parent
     *
     * @return Attribute
     */
    public function setParent($parent)
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
     *
     * @return Attribute
     */
    public function setGroup($group)
    {
        $this->group = $group;

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
            'type' => $this->type,
            'value' => $this->value,
            'slug' => $this->slug,
            'additional_text_data' => $this->additionalTextData,
            'full_hierarchy_value' => $this->fullHierarchyValue,
            'parent' => $this->parent,
            'group' => $this->group
        ];
    }
}