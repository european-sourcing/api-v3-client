<?php

namespace Medialeads\Apiv3Client\Model;

class DeliveryTime implements \JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $value;

    /**
     * @var array
     */
    private $supplierProfiles;

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
     * @return DeliveryTime
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
     * @return DeliveryTime
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return array
     */
    public function getSupplierProfiles()
    {
        return $this->supplierProfiles;
    }

    /**
     * @param array $supplierProfiles
     *
     * @return DeliveryTime
     */
    public function setSupplierProfiles($supplierProfiles)
    {
        $this->supplierProfiles = $supplierProfiles;

        return $this;
    }

    /**
     * @param SupplierProfile $supplierProfile
     *
     * @return DeliveryTime
     */
    public function addSupplierProfile(SupplierProfile $supplierProfile)
    {
        $this->supplierProfiles[] = $supplierProfile;

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
            'supplier_profiles' => $this->supplierProfiles
        ];
    }
}