<?php

namespace EuropeanSourcing\Apiv3Client\Model\ProductDetails;

use EuropeanSourcing\Apiv3Client\Model\Brand;
use EuropeanSourcing\Apiv3Client\Model\ExtremumPrice;

class Product
{
    private int $id;

    private bool $hasMarking;

    private Category $mainCategory;

    private ?string $countryOfOrigin = null;

    private ?string $unionCustomsCode = null;

    private string $supplierBaseReference;

    private string $internalReference;

    /** @var array<ExtremumPrice> */
    private array $extremumPrices = [];

    private Variant $bestVariant;

    private ?Brand $brand = null;

    /** @var array<Category> */
    private array $categories = [];

    /** @var array<string, MultipleAttributeGroup|SimpleAttributeGroup> */
    private array $attributeGroups = [];

    /** @var array<int, VariantAttributes> */
    private array $variantsAttributes = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function isHasMarking(): bool
    {
        return $this->hasMarking;
    }

    public function setHasMarking(bool $hasMarking): self
    {
        $this->hasMarking = $hasMarking;

        return $this;
    }

    public function getMainCategory(): Category
    {
        return $this->mainCategory;
    }

    public function setMainCategory(Category $mainCategory): self
    {
        $this->mainCategory = $mainCategory;

        return $this;
    }

    public function getCountryOfOrigin(): ?string
    {
        return $this->countryOfOrigin;
    }

    public function setCountryOfOrigin(?string $countryOfOrigin): self
    {
        $this->countryOfOrigin = $countryOfOrigin;

        return $this;
    }

    public function getUnionCustomsCode(): ?string
    {
        return $this->unionCustomsCode;
    }

    public function setUnionCustomsCode(?string $unionCustomsCode): self
    {
        $this->unionCustomsCode = $unionCustomsCode;

        return $this;
    }

    public function getSupplierBaseReference(): string
    {
        return $this->supplierBaseReference;
    }

    public function setSupplierBaseReference(string $supplierBaseReference): self
    {
        $this->supplierBaseReference = $supplierBaseReference;

        return $this;
    }

    public function getInternalReference(): string
    {
        return $this->internalReference;
    }

    public function setInternalReference(string $internalReference): self
    {
        $this->internalReference = $internalReference;

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
    public function setExtremumPrices(array $extremumPrices): self
    {
        $this->extremumPrices = $extremumPrices;

        return $this;
    }

    public function addExtremumPrice(ExtremumPrice $extremumPrice): self
    {
        $this->extremumPrices[] = $extremumPrice;

        return $this;
    }

    public function getBestVariant(): Variant
    {
        return $this->bestVariant;
    }

    public function setBestVariant(Variant $bestVariant): self
    {
        $this->bestVariant = $bestVariant;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return array<Category>
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @param array<Category> $categories
     */
    public function setCategories(array $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * @return array<string, MultipleAttributeGroup|SimpleAttributeGroup>
     */
    public function getAttributeGroups(): array
    {
        return $this->attributeGroups;
    }

    public function addAttributeGroup(MultipleAttributeGroup|SimpleAttributeGroup $attributeGroup): self
    {
        $this->attributeGroups[$attributeGroup->getId()] = $attributeGroup;

        return $this;
    }

    /**
     * @return array<int, VariantAttributes>
     */
    public function getVariantsAttributes(): array
    {
        return $this->variantsAttributes;
    }

    public function addVariantAttributes(VariantAttributes $variantAttributes): self
    {
        $this->variantsAttributes[$variantAttributes->getId()] = $variantAttributes;

        return $this;
    }
}
