<?php

namespace EuropeanSourcing\Apiv3Client\Model\Marking;

use EuropeanSourcing\Apiv3Client\Common\Collection;

class SupplierOptionStaticVariablePriceHolder
{
    /** @var string */
    private $id;

    /** @var Collection */
    private $optionPrices;

    /** @var int */
    private $supplierProfileId;

    public function __construct()
    {
        $this->optionPrices = new Collection();
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

    public function getOptionPrices(): Collection
    {
        return $this->optionPrices;
    }

    public function setOptionPrices(Collection $optionPrices): static
    {
        $this->optionPrices = $optionPrices;

        return $this;
    }

    public function addOptionPrice(SupplierOptionPrice $supplierOptionPrice): static
    {
        $this->optionPrices->add($supplierOptionPrice->getFromQuantity(), $supplierOptionPrice);

        return $this;
    }

    public function getSupplierProfileId(): int
    {
        return $this->supplierProfileId;
    }

    public function setSupplierProfileId(int $supplierProfileId): static
    {
        $this->supplierProfileId = $supplierProfileId;

        return $this;
    }
}
