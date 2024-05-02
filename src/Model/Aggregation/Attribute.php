<?php

namespace EuropeanSourcing\Apiv3Client\Model\Aggregation;

use EuropeanSourcing\Apiv3Client\Common\CountableAggregableInterface;

class Attribute implements \JsonSerializable, CountableAggregableInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $groupId;

    /**
     * @var string
     */
    private $groupName;

    /**
     * @var int
     */
    private $count;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
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
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     *
     * @return Attribute
     */
    public function setCount(int $count): Attribute
    {
        $this->count = $count;

        return $this;
    }

    /**
     * @return string
     */
    public function getGroupId(): string
    {
        return $this->groupId;
    }

    /**
     * @param string $groupId
     *
     * @return Attribute
     */
    public function setGroupId(string $groupId): Attribute
    {
        $this->groupId = $groupId;

        return $this;
    }

    /**
     * @return string
     */
    public function getGroupName(): string
    {
        return $this->groupName;
    }

    /**
     * @param string $groupName
     *
     * @return Attribute
     */
    public function setGroupName(string $groupName): Attribute
    {
        $this->groupName = $groupName;

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
            'value' => $this->value,
            'group_id' => $this->groupId,
            'group_name' => $this->groupName,
            'count' => $this->count
        ];
    }
}
