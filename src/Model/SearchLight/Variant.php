<?php

namespace EuropeanSourcing\Apiv3Client\Model\SearchLight;

class Variant
{
    private int $id;

    private string $name;

    private string $internalReference;

    private string $supplierReference;

    private ?int $stock = null;

    private ?Image $mainImage = null;

    /**
     * @var array<SupplierProfile>
     */
    private array $supplierProfiles = [];

    /**
     * @var array<MinimumQuantity>
     */
    private array $minimumQuantities = [];

    private bool $hasPlanetImpact;

    private Product $product;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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

    public function getSupplierReference(): string
    {
        return $this->supplierReference;
    }

    public function setSupplierReference(string $supplierReference): static
    {
        $this->supplierReference = $supplierReference;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    public function getMainImage(): ?Image
    {
        return $this->mainImage;
    }

    public function setMainImage(?Image $mainImage): static
    {
        $this->mainImage = $mainImage;

        return $this;
    }

    /**
     * @return array<SupplierProfile>
     */
    public function getSupplierProfiles(): array
    {
        return $this->supplierProfiles;
    }

    /**
     * @param array<SupplierProfile> $supplierProfiles
     */
    public function setSupplierProfiles(array $supplierProfiles): static
    {
        $this->supplierProfiles = $supplierProfiles;

        return $this;
    }

    public function addSupplierProfile(SupplierProfile $supplierProfile): static
    {
        $this->supplierProfiles[] = $supplierProfile;

        return $this;
    }

    /**
     * @return array<MinimumQuantity>
     */
    public function getMinimumQuantities(): array
    {
        return $this->minimumQuantities;
    }

    /**
     * @param array<MinimumQuantity> $minimumQuantities
     */
    public function setMinimumQuantities(array $minimumQuantities): static
    {
        $this->minimumQuantities = $minimumQuantities;

        return $this;
    }

    public function addMinimumQuantity(MinimumQuantity $minimumQuantity): static
    {
        $this->minimumQuantities[] = $minimumQuantity;

        return $this;
    }

    public function hasPlanetImpact(): bool
    {
        return $this->hasPlanetImpact;
    }

    public function setHasPlanetImpact(bool $hasPlanetImpact): static
    {
        $this->hasPlanetImpact = $hasPlanetImpact;

        return $this;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): static
    {
        $this->product = $product;

        return $this;
    }
}
