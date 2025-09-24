<?php

namespace EuropeanSourcing\Apiv3Client\Model\ProductDetails;

use EuropeanSourcing\Apiv3Client\Model\AttributeGroup;
use EuropeanSourcing\Apiv3Client\Model\CarbonFootprint;
use EuropeanSourcing\Apiv3Client\Model\CarbonFootprintTextile;
use EuropeanSourcing\Apiv3Client\Model\Dpp;
use EuropeanSourcing\Apiv3Client\Model\ExternalLink;
use EuropeanSourcing\Apiv3Client\Model\Packaging;
use EuropeanSourcing\Apiv3Client\Model\Price;
use EuropeanSourcing\Apiv3Client\Model\SearchLight\Image;
use EuropeanSourcing\Apiv3Client\Model\SearchLight\MinimumQuantity;
use EuropeanSourcing\Apiv3Client\Model\SearchLight\SupplierProfile;
use EuropeanSourcing\Apiv3Client\Model\Size;

class Variant
{
    private int $id;

    private string $name;

    private string $slug;

    private ?string $description = null;

    private ?string $rawDescription = null;

    private ?string $markingAdditionalInformation = null;

    private string $supplierReference;

    private string $internalReference;

    private ?float $netWeight = null;

    private ?float $grossWeight = null;

    private ?int $stock = null;

    /**
     * @var array<Size>
     */
    private array $sizes = [];

    private ?Packaging $packaging = null;

    /**
     * @var array<SupplierProfile>
     */
    private array $supplierProfiles = [];

    /**
     * @var array<MinimumQuantity>
     */
    private array $minimumQuantities = [];

    /**
     * @var array<Price>
     */
    private array $prices = [];

    /**
     * @var array<Image>
     */
    private array $images = [];

    private ?string $europeanArticleNumbering = null;

    /**
     * @var array<Price>
     */
    private array $samplePrices = [];

    /**
     * @var array<ExternalLink>
     */
    private array $externalLinks = [];

    /**
     * @var array<Price>
     */
    private array $listPrices = [];

    private bool $mandatoryMarking;

    private bool $markingIncludedInVariantPrices;

    private bool $mainVariant;

    private ?Image $mainImage = null;

    private bool $hasPlanetImpact;

    private ?CarbonFootprint $carbonFootprint = null;

    private ?CarbonFootprintTextile $carbonFootprintTextile = null;

    private ?Dpp $dpp;

    private Product $product;

    private ?Price $lowestPrice = null;

    /** @var array<string, VariantAttributeGroup> */
    private array $attributeGroups = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRawDescription(): ?string
    {
        return $this->rawDescription;
    }

    public function setRawDescription(?string $rawDescription): self
    {
        $this->rawDescription = $rawDescription;

        return $this;
    }

    public function getMarkingAdditionalInformation(): ?string
    {
        return $this->markingAdditionalInformation;
    }

    public function setMarkingAdditionalInformation(?string $markingAdditionalInformation): self
    {
        $this->markingAdditionalInformation = $markingAdditionalInformation;

        return $this;
    }

    public function getSupplierReference(): string
    {
        return $this->supplierReference;
    }

    public function setSupplierReference(string $supplierReference): self
    {
        $this->supplierReference = $supplierReference;

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

    public function getNetWeight(): ?float
    {
        return $this->netWeight;
    }

    public function setNetWeight(?float $netWeight): self
    {
        $this->netWeight = $netWeight;

        return $this;
    }

    public function getGrossWeight(): ?float
    {
        return $this->grossWeight;
    }

    public function setGrossWeight(?float $grossWeight): self
    {
        $this->grossWeight = $grossWeight;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * @return array<Size>
     */
    public function getSizes(): array
    {
        return $this->sizes;
    }

    /**
     * @param array<Size> $sizes
     */
    public function setSizes(array $sizes): self
    {
        $this->sizes = $sizes;

        return $this;
    }

    public function addSize(Size $size): self
    {
        $this->sizes[] = $size;

        return $this;
    }

    public function getFormatedSizes(): string
    {
        $values = array_map(function (Size $size) {
            if ('diameter' == $size->getType()) {
                return sprintf('%s %s', 'Ø', round($size->getValue(), 2));
            } else {
                return round($size->getValue(), 2);
            }
        }, $this->sizes);

        return implode(' x ', $values);
    }

    public function getPackaging(): ?Packaging
    {
        return $this->packaging;
    }

    public function setPackaging(?Packaging $packaging): self
    {
        $this->packaging = $packaging;

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
    public function setSupplierProfiles(array $supplierProfiles): self
    {
        $this->supplierProfiles = $supplierProfiles;

        return $this;
    }

    public function addSupplierProfile(SupplierProfile $supplierProfile): self
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
    public function setMinimumQuantities(array $minimumQuantities): self
    {
        $this->minimumQuantities = $minimumQuantities;

        return $this;
    }

    public function addMinimumQuantity(MinimumQuantity $minimumQuantity): self
    {
        $this->minimumQuantities[] = $minimumQuantity;

        return $this;
    }

    public function getLowestMinimumQuantity(): ?MinimumQuantity
    {
        $lowestMinimumQuantity = null;
        foreach ($this->minimumQuantities as $minimumQuantity) {
            if (
                null === $lowestMinimumQuantity
                || $minimumQuantity->getValue() < $lowestMinimumQuantity->getValue()
            ) {
                $lowestMinimumQuantity = $minimumQuantity;
            }
        }

        return $lowestMinimumQuantity;
    }

    /**
     * @return array<Price>
     */
    public function getPrices(): array
    {
        return $this->prices;
    }

    /**
     * @param array<Price> $prices
     */
    public function setPrices(array $prices): self
    {
        $this->prices = $prices;

        return $this;
    }

    public function addPrice(Price $price): self
    {
        $this->prices[] = $price;

        return $this;
    }

    /**
     * @return array<Image>
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param array<Image> $images
     */
    public function setImages(array $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function addImage(Image $image): self
    {
        $this->images[] = $image;

        return $this;
    }

    public function getEuropeanArticleNumbering(): ?string
    {
        return $this->europeanArticleNumbering;
    }

    public function setEuropeanArticleNumbering(?string $europeanArticleNumbering): self
    {
        $this->europeanArticleNumbering = $europeanArticleNumbering;

        return $this;
    }

    /**
     * @return array<Price>
     */
    public function getSamplePrices(): array
    {
        return $this->samplePrices;
    }

    /**
     * @param array<Price> $samplePrices
     */
    public function setSamplePrices(array $samplePrices): self
    {
        $this->samplePrices = $samplePrices;

        return $this;
    }

    public function addSamplePrice(Price $samplePrice): self
    {
        $this->samplePrices[] = $samplePrice;

        return $this;
    }

    /**
     * @return array<ExternalLink>
     */
    public function getExternalLinks(): array
    {
        return $this->externalLinks;
    }

    /**
     * @param array<ExternalLink> $externalLinks
     */
    public function setExternalLinks(array $externalLinks): self
    {
        $this->externalLinks = $externalLinks;

        return $this;
    }

    public function addExternalLink(ExternalLink $externalLink): self
    {
        $this->externalLinks[] = $externalLink;

        return $this;
    }

    /**
     * @return array<Price>
     */
    public function getListPrices(): array
    {
        return $this->listPrices;
    }

    /**
     * @param  array<Price> $listPrices
     */
    public function setListPrices(array $listPrices): self
    {
        $this->listPrices = $listPrices;

        return $this;
    }

    public function addListPrice(Price $listPrice): self
    {
        $this->listPrices[] = $listPrice;

        return $this;
    }

    public function isMandatoryMarking(): bool
    {
        return $this->mandatoryMarking;
    }

    public function setMandatoryMarking(bool $mandatoryMarking): self
    {
        $this->mandatoryMarking = $mandatoryMarking;

        return $this;
    }

    public function isMarkingIncludedInVariantPrices(): bool
    {
        return $this->markingIncludedInVariantPrices;
    }

    public function setMarkingIncludedInVariantPrices(bool $markingIncludedInVariantPrices): self
    {
        $this->markingIncludedInVariantPrices = $markingIncludedInVariantPrices;

        return $this;
    }

    public function isMainVariant(): bool
    {
        return $this->mainVariant;
    }

    public function setMainVariant(bool $mainVariant): self
    {
        $this->mainVariant = $mainVariant;

        return $this;
    }

    public function getMainImage(): ?Image
    {
        return $this->mainImage;
    }

    public function setMainImage(?Image $mainImage): self
    {
        $this->mainImage = $mainImage;
        array_unshift($this->images, $mainImage);

        return $this;
    }

    public function isHasPlanetImpact(): bool
    {
        return $this->hasPlanetImpact;
    }

    public function setHasPlanetImpact(bool $hasPlanetImpact): self
    {
        $this->hasPlanetImpact = $hasPlanetImpact;

        return $this;
    }

    public function getCarbonFootprint(): ?CarbonFootprint
    {
        return $this->carbonFootprint;
    }

    public function setCarbonFootprint(?CarbonFootprint $carbonFootprint): self
    {
        $this->carbonFootprint = $carbonFootprint;

        return $this;
    }

    public function getCarbonFootprintTextile(): ?CarbonFootprintTextile
    {
        return $this->carbonFootprintTextile;
    }

    public function setCarbonFootprintTextile(?CarbonFootprintTextile $carbonFootprintTextile): self
    {
        $this->carbonFootprintTextile = $carbonFootprintTextile;

        return $this;
    }

    public function getDpp(): ?Dpp
    {
        return $this->dpp;
    }

    public function setDpp(?Dpp $dpp): self
    {
        $this->dpp = $dpp;

        return $this;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getLowestPrice(): ?Price
    {
        return $this->lowestPrice;
    }

    public function setLowestPrice(?Price $lowestPrice): self
    {
        $this->lowestPrice = $lowestPrice;

        return $this;
    }

    /**
     * @return array<string, VariantAttributeGroup>
     */
    public function getAttributeGroups(): array
    {
        return $this->attributeGroups;
    }

    public function addAttributeGroup(VariantAttributeGroup $attributeGroup): self
    {
        $this->attributeGroups[$attributeGroup->getId()] = $attributeGroup;

        return $this;
    }
}
