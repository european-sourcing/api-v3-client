<?php

namespace Medialeads\Apiv3Client\Model;

class MinimumQuantity implements \JsonSerializable
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
     * @return MinimumQuantity
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
     * @return MinimumQuantity
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
     * @return MinimumQuantity
     */
    public function setSupplierProfiles($supplierProfiles)
    {
        $this->supplierProfiles = $supplierProfiles;

        return $this;
    }

    /**
     * @param SupplierProfile $supplierProfile
     *
     * @return MinimumQuantity
     */
    public function addSupplierProfile(SupplierProfile $supplierProfile)
    {
        $this->supplierProfiles[] = $supplierProfile;

        return $this;
    }

    /**
     * @inheritDoc
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
