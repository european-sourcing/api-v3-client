<?php

namespace Medialeads\Apiv3Client\Model\Marking;

use Medialeads\Apiv3Client\Common\Collection;

class SupplierOptionDynamicVariablePriceHolder
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

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getOptionPrices(): Collection
    {
        return $this->optionPrices;
    }

    public function setOptionPrices(Collection $optionPrices): self
    {
        $this->optionPrices = $optionPrices;

        return $this;
    }

    public function addOptionPrice(SupplierOptionPrice $supplierOptionPrice): self
    {
        $this->optionPrices->add($supplierOptionPrice->getFromQuantity(), $supplierOptionPrice);

        return $this;
    }

    public function getSupplierProfileId(): int
    {
        return $this->supplierProfileId;
    }

    public function setSupplierProfileId(int $supplierProfileId): self
    {
        $this->supplierProfileId = $supplierProfileId;

        return $this;
    }
}
