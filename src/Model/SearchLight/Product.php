<?php

namespace EuropeanSourcing\Apiv3Client\Model\SearchLight;

use EuropeanSourcing\Apiv3Client\Model\ExtremumPrice;

class Product
{
    private int $id;

    private string $internalReference;

    private bool $hasMarking;

    private Variant $bestVariant;

    private ?Brand $brand = null;

    /** @var array<ExtremumPrice> */
    private array $extremumPrices = [];

    private Supplier $supplier;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getInternalReference(): string
    {
        return $this->internalReference;
    }

    public function setInternalReference(string $internalReference): static
    {
        $this->internalReference = $internalReference;

        return $this;
    }

    public function isHasMarking(): bool
    {
        return $this->hasMarking;
    }

    public function setHasMarking(bool $hasMarking): static
    {
        $this->hasMarking = $hasMarking;

        return $this;
    }

    public function getBestVariant(): Variant
    {
        return $this->bestVariant;
    }

    public function setBestVariant(Variant $bestVariant): static
    {
        $this->bestVariant = $bestVariant;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return array<ExtremumPrice>
     */
    public function getExtremumPrices(): array
    {
        return $this->extremumPrices;
    }

    /**
     * @param array<ExtremumPrice> $extremumPrices
     */
    public function setExtremumPrices(array $extremumPrices): static
    {
        $this->extremumPrices = $extremumPrices;

        return $this;
    }

    public function addExtremumPrice(ExtremumPrice $extremumPrice): static
    {
        $this->extremumPrices[] = $extremumPrice;

        return $this;
    }

    public function getSupplier(): Supplier
    {
        return $this->supplier;
    }

    public function setSupplier(Supplier $supplier): static
    {
        $this->supplier = $supplier;

        return $this;
    }
}
