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
     */
    public function setId($id): static
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
     */
    public function setFromQuantity($fromQuantity): static
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
     */
    public function setValue($value): static
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
     */
    public function setCalculationValue($calculationValue): static
    {
        $this->calculationValue = $calculationValue;

        return $this;
    }

    public function getSupplierProfile(): SupplierProfile
    {
        return $this->supplierProfile;
    }

    public function setSupplierProfile(SupplierProfile $supplierProfile): static
    {
        $this->supplierProfile = $supplierProfile;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
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
