<?php

namespace EuropeanSourcing\Apiv3Client\Model\Marking;

use EuropeanSourcing\Apiv3Client\Common\Collection;

class StaticFixedPrice
{
    /** @var string */
    private $id;

    /** @var string|null */
    private $value;

    /** @var string */
    private $reducedValue;

    /** @var string */
    private $calculationValue;

    /** @var string */
    private $condition;

    /** @var bool */
    private $totalPrice;

    /** @var Collection */
    private $markingFees;

    /** @var SupplierProfile */
    private $supplierProfile;

    public function __construct()
    {
        $this->markingFees = new Collection();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getReducedValue(): ?string
    {
        return $this->reducedValue;
    }

    public function setReducedValue(?string $reducedValue): self
    {
        $this->reducedValue = $reducedValue;

        return $this;
    }

    public function getCalculationValue(): string
    {
        return $this->calculationValue;
    }

    public function setCalculationValue(string $calculationValue): self
    {
        $this->calculationValue = $calculationValue;

        return $this;
    }

    public function getCondition(): ?string
    {
        return $this->condition;
    }

    public function setCondition(?string $condition): self
    {
        $this->condition = $condition;

        return $this;
    }

    public function isTotalPrice(): bool
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(bool $totalPrice): self
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    public function getMarkingFees(): Collection
    {
        return $this->markingFees;
    }

    public function setMarkingFees(Collection $markingFees): self
    {
        $this->markingFees = $markingFees;

        return $this;
    }

    public function addMarkingFee(MarkingFee $markingFee): self
    {
        $this->markingFees->add($markingFee->getId(), $markingFee);

        return $this;
    }

    public function getSupplierProfile(): SupplierProfile
    {
        return $this->supplierProfile;
    }

    public function setSupplierProfile(SupplierProfile $supplierProfile): self
    {
        $this->supplierProfile = $supplierProfile;

        return $this;
    }
}
