<?php
namespace EuropeanSourcing\Apiv3Client\Model;

class Product
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $supplierBaseReference;

    /**
     * @var string
     */
    private $internalReference;

    private ?string $countryOfOrigin = null;

    private ?string $unionCustomsCode = null;

    /**
     * @var bool
     */
    private $hasMarking;

    /**
     * @var \DateTime
     */
    private $lastIndexedAt;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var array
     */
    private $images;

    private ?Variant $mainVariant = null;

    private ?Variant $bestVariant = null;

    /**
     * @var array<Variant>
     */
    private array $variants = [];

    private ?Category $mainCategory = null;

    /**
     * @var array<Category>
     */
    private array $categories = [];

    private ?Supplier $supplier = null;

    private ?Brand $brand = null;

    /**
     * @var array<Label>
     */
    private array $labels = [];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id): static
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Generate all attributes of all variants
     */
    public function processAttributes()
    {
        $groups = [];

        /** @var Variant $variant */
        foreach ($this->variants as $variant) {
            /** @var Attribute $attribute */
            foreach ($variant->processAttributes() as $groupId => $group) {
                if (empty($groups[$groupId])) {
                    $groups[$groupId] = [
                        'id' => $group['id'],
                        'name' => $group['name'],
                        'slug' => $group['slug'],
                        'attributes' => []
                    ];
                }

                foreach ($group['attributes'] as $attribute) {
                    $groups[$groupId]['attributes'][$variant->getId()][] = $attribute;
                }
            }
        }

        return $groups;
    }

    /**
     * @return string
     */
    public function getSupplierBaseReference()
    {
        return $this->supplierBaseReference;
    }

    /**
     * @param string $supplierBaseReference
     */
    public function setSupplierBaseReference($supplierBaseReference): static
    {
        $this->supplierBaseReference = $supplierBaseReference;

        return $this;
    }

    /**
     * @return string
     */
    public function getInternalReference()
    {
        return $this->internalReference;
    }

    /**
     * @param string $internalReference
     */
    public function setInternalReference($internalReference): static
    {
        $this->internalReference = $internalReference;

        return $this;
    }

    public function getCountryOfOrigin(): ?string
    {
        return $this->countryOfOrigin;
    }

    public function setCountryOfOrigin(?string $countryOfOrigin): static
    {
        $this->countryOfOrigin = $countryOfOrigin;

        return $this;
    }

    public function getUnionCustomsCode(): ?string
    {
        return $this->unionCustomsCode;
    }

    public function setUnionCustomsCode(?string $unionCustomsCode): static
    {
        $this->unionCustomsCode = $unionCustomsCode;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasMarking()
    {
        return $this->hasMarking;
    }

    /**
     * @param bool $hasMarking
     */
    public function setHasMarking($hasMarking): static
    {
        $this->hasMarking = $hasMarking;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastIndexedAt()
    {
        return $this->lastIndexedAt;
    }

    /**
     * @param \DateTime $lastIndexedAt
     */
    public function setLastIndexedAt($lastIndexedAt): static
    {
        $this->lastIndexedAt = $lastIndexedAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return array
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param array $images
     */
    public function setImages($images): static
    {
        $this->images = $images;

        return $this;
    }

    public function addimage(Image $image): static
    {
        $this->images[] = $image;

        return $this;
    }

    public function getMainVariant(): ?Variant
    {
        return $this->mainVariant;
    }

    public function setMainVariant(?Variant $mainVariant): static
    {
        $this->mainVariant = $mainVariant;

        return $this;
    }

    public function getBestVariant(): ?Variant
    {
        return $this->bestVariant;
    }

    public function setBestVariant(?Variant $bestVariant): static
    {
        $this->bestVariant = $bestVariant;

        return $this;
    }

    /**
     * @return array<Variant>
     */
    public function getVariants(): array
    {
        return $this->variants;
    }

    /**
     * @param array<Variant> $variants
     */
    public function setVariants(array $variants): static
    {
        $this->variants = $variants;

        return $this;
    }

    public function addVariant(Variant $variant): static
    {
        $this->variants[] = $variant;

        return $this;
    }

    public function getMainCategory(): ?Category
    {
        return $this->mainCategory;
    }

    public function setMainCategory(?Category $mainCategory): static
    {
        $this->mainCategory = $mainCategory;

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
    public function setCategories(array $categories): static
    {
        $this->categories = $categories;

        return $this;
    }

    public function getSupplier(): ?Supplier
    {
        return $this->supplier;
    }

    public function setSupplier(?Supplier $supplier): static
    {
        $this->supplier = $supplier;

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
     * @return array<Label>
     */
    public function getLabels(): array
    {
        return $this->labels;
    }

    /**
     * @param array<Label> $labels
     */
    public function setLabels(array $labels): static
    {
        $this->labels = $labels;

        return $this;
    }

    public function addLabel(Label $label): static
    {
        $this->labels[] = $label;

        return $this;
    }
}
