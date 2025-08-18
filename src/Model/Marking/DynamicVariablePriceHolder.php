<?php

namespace EuropeanSourcing\Apiv3Client\Model\Marking;

use EuropeanSourcing\Apiv3Client\Common\Collection;

class DynamicVariablePriceHolder
{
    /** @var string */
    private $id;

    private ?string $condition = null;

    /** @var bool */
    private $totalPrice;

    /** @var Collection */
    private $markingFees;

    /** @var SupplierProfile */
    private $supplierProfile;

    /** @var Collection */
    private $prices;

    public function __construct()
    {
        $this->markingFees = new Collection();
        $this->prices = new Collection();
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

    public function getPrices(): Collection
    {
        return $this->prices;
    }

    public function setPrices(Collection $prices): static
    {
        $this->prices = $prices;

        return $this;
    }

    public function addPrice(MarkingPrice $markingPrice): static
    {
        $this->prices->add($markingPrice->getFromQuantity(), $markingPrice);

        return $this;
    }
}
