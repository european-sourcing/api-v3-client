<?php

namespace EuropeanSourcing\Apiv3Client\Model;

class MinimumQuantity implements \JsonSerializable
{
    /**
     * @var string
     */
    private $value;

    /**
     * @var SupplierProfile
     */
    private $supplierProfile;

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
     * @return SupplierProfile
     */
    public function getSupplierProfile(): SupplierProfile
    {
        return $this->supplierProfile;
    }

    /**
     * @param SupplierProfile $supplierProfile
     * @return MinimumQuantity
     */
    public function setSupplierProfile(SupplierProfile $supplierProfile): self
    {
        $this->supplierProfile = $supplierProfile;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'value' => $this->value,
            'supplier_profile' => $this->supplierProfile
        ];
    }
}
