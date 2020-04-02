<?php

namespace Medialeads\Apiv3Client\Model\Marking;

class SupplierOptionPrice
{
    /** @var int */
    private $fromQuantity;

    /** @var float */
    private $value;

    /** @var float */
    private $reducedValue;

    /** @var float */
    private $calculationValue;

    public function getFromQuantity(): int
    {
        return $this->fromQuantity;
    }

    public function setFromQuantity(int $fromQuantity): SupplierOptionPrice
    {
        $this->fromQuantity = $fromQuantity;

        return $this;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(float $value): SupplierOptionPrice
    {
        $this->value = $value;

        return $this;
    }

    public function getReducedValue(): ?float
    {
        return $this->reducedValue;
    }

    public function setReducedValue(?float $reducedValue): SupplierOptionPrice
    {
        $this->reducedValue = $reducedValue;

        return $this;
    }

    public function getCalculationValue(): float
    {
        return $this->calculationValue;
    }

    public function setCalculationValue(float $calculationValue): SupplierOptionPrice
    {
        $this->calculationValue = $calculationValue;

        return $this;
    }
}
