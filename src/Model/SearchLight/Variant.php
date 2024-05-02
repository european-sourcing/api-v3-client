<?php

namespace EuropeanSourcing\Apiv3Client\Model\SearchLight;

class Variant
{
    private int $id;

    private string $name;

    private string $internalReference;

    private string $supplierReference;

    private ?int $stock = null;

    private Image $mainImage;

    /**
     * @var array<SupplierProfile>
     */
    private array $supplierProfiles = [];

    /**
     * @var array<MinimumQuantity>
     */
    private array $minimumQuantities = [];

    private Product $product;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Variant
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Variant
    {
        $this->name = $name;

        return $this;
    }

    public function getInternalReference(): string
    {
        return $this->internalReference;
    }

    public function setInternalReference(string $internalReference): Variant
    {
        $this->internalReference = $internalReference;

        return $this;
    }

    public function getSupplierReference(): string
    {
        return $this->supplierReference;
    }

    public function setSupplierReference(string $supplierReference): Variant
    {
        $this->supplierReference = $supplierReference;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): Variant
    {
        $this->stock = $stock;

        return $this;
    }

    public function getMainImage(): Image
    {
        return $this->mainImage;
    }

    public function setMainImage(Image $mainImage): Variant
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
    public function setSupplierProfiles(array $supplierProfiles): Variant
    {
        $this->supplierProfiles = $supplierProfiles;

        return $this;
    }

    public function addSupplierProfile(SupplierProfile $supplierProfile): Variant
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
    public function setMinimumQuantities(array $minimumQuantities): Variant
    {
        $this->minimumQuantities = $minimumQuantities;

        return $this;
    }

    public function addMinimumQuantity(MinimumQuantity $minimumQuantity): Variant
    {
        $this->minimumQuantities[] = $minimumQuantity;

        return $this;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): Variant
    {
        $this->product = $product;

        return $this;
    }
}
