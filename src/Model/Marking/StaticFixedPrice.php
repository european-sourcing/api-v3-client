<?php

namespace EuropeanSourcing\Apiv3Client\Model\Marking;

use EuropeanSourcing\Apiv3Client\Common\Collection;

class StaticFixedPrice
{
    /** @var string */
    private $id;

    private ?string $value = null;

    /** @var string */
    private $calculationValue;

    private ?string $condition = null;

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

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): static
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

    public function getCondition(): ?string
    {
        return $this->condition;
    }

    public function setCondition(?string $condition): static
    {
        $this->condition = $condition;

        return $this;
    }

    public function isTotalPrice(): bool
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(bool $totalPrice): static
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    public function getMarkingFees(): Collection
    {
        return $this->markingFees;
    }

    public function setMarkingFees(Collection $markingFees): static
    {
        $this->markingFees = $markingFees;

        return $this;
    }

    public function addMarkingFee(MarkingFee $markingFee): static
    {
        $this->markingFees->add($markingFee->getId(), $markingFee);

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
}
