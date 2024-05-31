<?php

namespace EuropeanSourcing\Apiv3Client\Model;

class Price implements \JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $fromQuantity;

    /**
     * @var float
     */
    private $value;

    /**
     * @var float
     */
    private $calculationValue;

    /**
     * @var SupplierProfile
     */
    private $supplierProfile;

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
     * @return Price
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getFromQuantity()
    {
        return $this->fromQuantity;
    }

    /**
     * @param int $fromQuantity
     *
     * @return Price
     */
    public function setFromQuantity($fromQuantity)
    {
        $this->fromQuantity = $fromQuantity;

        return $this;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     *
     * @return Price
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getCalculationValue()
    {
        return $this->calculationValue;
    }

    /**
     * @param float $calculationValue
     *
     * @return Price
     */
    public function setCalculationValue($calculationValue)
    {
        $this->calculationValue = $calculationValue;

        return $this;
    }

    /**
     * @return array
     */
    public function getSupplierProfile(): SupplierProfile
    {
        return $this->supplierProfile;
    }

    /**
     * @param SupplierProfile $supplierProfile
     *
     * @return Price
     */
    public function setSupplierProfile(SupplierProfile $supplierProfile)
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
            'id' => $this->id,
            'from_quantity' => $this->fromQuantity,
            'value' => $this->value,
            'calculation_value' => $this->calculationValue,
            'supplier_profile' => $this->supplierProfile
        ];
    }
}
