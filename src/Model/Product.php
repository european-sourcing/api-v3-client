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

    /**
     * @var string
     */
    private $countryOfOrigin;

    /**
     * @var string
     */
    private $unionCustomsCode;

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

    /**
     * @var Variant
     */
    private $mainVariant;

    /**
     * @var Variant
     */
    private $bestVariant;

    /**
     * @var array
     */
    private $variants;

    /**
     * @var Category
     */
    private $mainCategory;

    /**
     * @var array
     */
    private $categories;

    /**
     * @var Supplier
     */
    private $supplier;

    /**
     * @var Brand
     */
    private $brand;

    /**
     * @var array
     */
    private $labels;

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

    /**
     * @return string
     */
    public function getCountryOfOrigin()
    {
        return $this->countryOfOrigin;
    }

    /**
     * @param string $countryOfOrigin
     */
    public function setCountryOfOrigin($countryOfOrigin): static
    {
        $this->countryOfOrigin = $countryOfOrigin;

        return $this;
    }

    /**
     * @return string
     */
    public function getUnionCustomsCode()
    {
        return $this->unionCustomsCode;
    }

    /**
     * @param string $unionCustomsCode
     */
    public function setUnionCustomsCode($unionCustomsCode): static
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

    /**
     * @return Variant
     */
    public function getMainVariant()
    {
        return $this->mainVariant;
    }

    /**
     * @param Variant $mainVariant
     */
    public function setMainVariant($mainVariant): static
    {
        $this->mainVariant = $mainVariant;

        return $this;
    }

    /**
     * @return Variant
     */
    public function getBestVariant()
    {
        return $this->bestVariant;
    }

    /**
     * @param Variant $bestVariant
     */
    public function setBestVariant($bestVariant): static
    {
        $this->bestVariant = $bestVariant;

        return $this;
    }

    /**
     * @return array
     */
    public function getVariants()
    {
        return $this->variants;
    }

    /**
     * @param array $variants
     */
    public function setVariants($variants): static
    {
        $this->variants = $variants;

        return $this;
    }

    public function addVariant(Variant $variant): static
    {
        $this->variants[] = $variant;

        return $this;
    }

    /**
     * @return Category
     */
    public function getMainCategory()
    {
        return $this->mainCategory;
    }

    /**
     * @param Category $mainCategory
     */
    public function setMainCategory($mainCategory): static
    {
        $this->mainCategory = $mainCategory;

        return $this;
    }

    /**
     * @return array
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param array $categories
     */
    public function setCategories($categories): static
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * @return Supplier
     */
    public function getSupplier()
    {
        return $this->supplier;
    }

    /**
     * @param Supplier $supplier
     */
    public function setSupplier($supplier): static
    {
        $this->supplier = $supplier;

        return $this;
    }

    /**
     * @return Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param Brand $brand
     */
    public function setBrand($brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return array
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param array $labels
     */
    public function setLabels($labels): static
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
