<?php

namespace EuropeanSourcing\Apiv3Client\Model\Marking;

class MarkingPrice
{
    /** @var string */
    private $id;

    /** @var string */
    private $fromQuantity;

    /** @var string */
    private $value;

    /** @var string */
    private $calculationValue;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getFromQuantity(): string
    {
        return $this->fromQuantity;
    }

    public function setFromQuantity(string $fromQuantity): static
    {
        $this->fromQuantity = $fromQuantity;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function getCalculationValue(): string
    {
        return $this->calculationValue;
    }

    public function setCalculationValue(string $calculationValue): static
    {
        $this->calculationValue = $calculationValue;

        return $this;
    }
}
