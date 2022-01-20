<?php
namespace Medialeads\Apiv3Client\Model;

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
     *
     * @return Product
     */
    public function setId($id)
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
            dump($variant);
            /** @var Attribute $attribute */
            foreach ($variant->processAttributes() as $groupId => $group) {
                dump($variant->processAttributes());
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
     *
     * @return Product
     */
    public function setSupplierBaseReference($supplierBaseReference)
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
     *
     * @return Product
     */
    public function setInternalReference($internalReference)
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
     *
     * @return Product
     */
    public function setCountryOfOrigin($countryOfOrigin)
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
     *
     * @return Product
     */
    public function setUnionCustomsCode($unionCustomsCode)
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
     *
     * @return Product
     */
    public function setHasMarking($hasMarking)
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
     *
     * @return Product
     */
    public function setLastIndexedAt($lastIndexedAt)
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
     *
     * @return Product
     */
    public function setCreatedAt($createdAt)
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
     *
     * @return Product
     */
    public function setUpdatedAt($updatedAt)
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
     *
     * @return Product
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * @param Image $image
     *
     * @return Product
     */
    public function addimage(Image $image)
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
     *
     * @return Product
     */
    public function setMainVariant($mainVariant)
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
     *
     * @return Product
     */
    public function setBestVariant($bestVariant)
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
     *
     * @return Product
     */
    public function setVariants($variants)
    {
        $this->variants = $variants;

        return $this;
    }

    /**
     * @param Variant $variant
     *
     * @return Product
     */
    public function addVariant(Variant $variant)
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
     *
     * @return Product
     */
    public function setMainCategory($mainCategory)
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
     *
     * @return Product
     */
    public function setCategories($categories)
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
     *
     * @return Product
     */
    public function setSupplier($supplier)
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
     *
     * @return Product
     */
    public function setBrand($brand)
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
     *
     * @return Product
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;

        return $this;
    }

    /**
     * @param Label $label
     *
     * @return Product
     */
    public function addLabel(Label $label)
    {
        $this->labels[] = $label;

        return $this;
    }
}
