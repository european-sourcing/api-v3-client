<?php

namespace EuropeanSourcing\Apiv3Client\Model;

use EuropeanSourcing\Apiv3Client\Common\SupplierProfileInterface;

class Variant implements \JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $rawDescription;

    /**
     * @var string
     */
    private $supplierReference;

    private ?int $stock = null;

    private ?string $markingAdditionalInformation = null;

    private ?float $netWeight = null;

    private ?float $grossWeight = null;

    private ?string $europeanArticleNumbering = null;

    /**
     * @var bool
     */
    private $mandatoryMarking;

    private ?Image $mainImage = null;

    private array $images = [];

    /**
     * @var array<Keyword>
     */
    private array $keywords = [];

    /**
     * @var array<SupplierProfile>
     */
    private array $supplierProfiles = [];

    /**
     * @var array<Size>
     */
    private array $sizes = [];

    private ?Packaging $packaging = null;

    /**
     * @var array<MinimumQuantity>
     */
    private array $minimumQuantities = [];

    /**
     * @var array<Price>
     */
    private array $prices = [];

    private ?Price $lowestPrice = null;

    /**
     * @var array<Price>
     */
    private array $samplePrices = [];

    /**
     * @var array<Price>
     */
    private array $listPrices = [];

    /**
     * @var array<ExternalLink>
     */
    private array $externalLinks = [];

    /**
     * @var array<Attribute>
     */
    private array $attributes = [];

    /**
     * @var array<DeliveryTime>
     */
    private array $deliveryTimes = [];

    private bool $hasPlanetImpact;

    private ?CarbonFootprint $carbonFootprint = null;

    private ?CarbonFootprintTextile $carbonFootprintTextile = null;

    private ?Dpp $dpp;

    /**
     * @var Product
     */
    private $product;

    private string $internalReference;

    public function processAttributes()
    {
        $groups = [];

        if (!empty($this->getAttributes())) {
            /** @var Attribute $attribute */
            foreach ($this->getAttributes() as $attribute) {
                if (empty($groups[$attribute->getGroup()->getId()])) {
                    $groups[$attribute->getGroup()->getId()] = [
                        'id' => $attribute->getGroup()->getId(),
                        'name' => $attribute->getGroup()->getName(),
                        'slug' => $attribute->getGroup()->getSlug(),
                        'attributes' => []
                    ];
                }

                $groups[$attribute->getGroup()->getId()]['attributes'][] = [
                    'id' => $attribute->getId(),
                    'value' => $attribute->getValue()
                ];
            }
        }

        return $groups;
    }

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getRawDescription()
    {
        return $this->rawDescription;
    }

    /**
     * @param string $rawDescription
     */
    public function setRawDescription($rawDescription): static
    {
        $this->rawDescription = $rawDescription;

        return $this;
    }

    /**
     * @return string
     */
    public function getSupplierReference()
    {
        return $this->supplierReference;
    }

    /**
     * @param string $supplierReference
     */
    public function setSupplierReference($supplierReference): static
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

    public function getMarkingAdditionalInformation(): ?string
    {
        return $this->markingAdditionalInformation;
    }

    public function setMarkingAdditionalInformation(?string $markingAdditionalInformation): static
    {
        $this->markingAdditionalInformation = $markingAdditionalInformation;

        return $this;
    }

    /**
     * @return array<Keyword>
     */
    public function getKeywords(): array
    {
        return $this->keywords;
    }

    /**
     * @param array<Keyword> $keywords
     */
    public function setKeywords(array $keywords): static
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function addKeyword(Keyword $keyword): static
    {
        $this->keywords[] = $keyword;

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
     * @return array<Size>
     */
    public function getSizes(): array
    {
        return $this->sizes;
    }

    /**
     * @param array<Size> $sizes
     */
    public function setSizes(array $sizes): static
    {
        $this->sizes = $sizes;

        return $this;
    }

    public function addSize(Size $size): static
    {
        $this->sizes[] = $size;

        return $this;
    }

    /**
     * @return string
     */
    public function getFormatedSizes()
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

    public function getNetWeight(): ?float
    {
        return $this->netWeight;
    }

    public function setNetWeight(?float $netWeight): static
    {
        $this->netWeight = $netWeight;

        return $this;
    }

    public function getGrossWeight(): ?float
    {
        return $this->grossWeight;
    }

    public function setGrossWeight(?float $grossWeight): static
    {
        $this->grossWeight = $grossWeight;

        return $this;
    }

    public function getEuropeanArticleNumbering(): ?string
    {
        return $this->europeanArticleNumbering;
    }

    public function setEuropeanArticleNumbering(?string $europeanArticleNumbering): static
    {
        $this->europeanArticleNumbering = $europeanArticleNumbering;

        return $this;
    }

    /**
     * @return bool
     */
    public function isMandatoryMarking()
    {
        return $this->mandatoryMarking;
    }

    /**
     * @param bool $mandatoryMarking
     */
    public function setMandatoryMarking($mandatoryMarking): static
    {
        $this->mandatoryMarking = $mandatoryMarking;

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
     * @return array<Image>
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param array<Image> $images
     */
    public function setImages(array $images): static
    {
        $this->images = $images;

        return $this;
    }

    public function addImage(Image $image): static
    {
        $this->images[] = $image;

        return $this;
    }

    public function getPackaging(): ?Packaging
    {
        return $this->packaging;
    }

    public function setPackaging(?Packaging $packaging): static
    {
        $this->packaging = $packaging;

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

    /**
     * Minimal command quantity
     *
     * @return MinimumQuantity|null
     */
    public function getLowestMinimumQuantity()
    {
        $lowestMinimumQuantity = null;
        /** @var MinimumQuantity $minimumQuantity */
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
     * Minimal quantity price
     * @return int
     */
    public function getLowestQuantity()
    {
        $lowestQuantity = null;
        foreach ($this->prices as $price) {
            if ((null === $lowestQuantity) || ($price->getFromQuantity() < $lowestQuantity)) {
                $lowestQuantity = $price->getFromQuantity();
            }
        }

        return $lowestQuantity;
    }

    /**
     * @return array<Price>
     */
    public function getPrices(): array
    {
        return $this->prices;
    }

    /**
     * @param array<Price> $price
     */
    public function setPrices(array $price): static
    {
        $this->prices = $price;

        return $this;
    }

    /**
     * @param int $quantity
     *
     * @return Price
     */
    public function getPriceForQuantity($quantity)
    {
        $bestPrice = null;
        foreach ($this->prices as $price) {
            if ($price->getFromQuantity() <= $quantity) {
                $bestPrice = $price;
            }
        }

        return $bestPrice;
    }

    /**
     * @param int $quantity
     *
     * @return Price
     */
    public function getPriceForQuantityWithSupplierProfile($quantity, SupplierProfileInterface $supplierProfile)
    {
        $bestPrice = null;
        foreach ($this->prices as $price) {
            if (
                null !== $price->getSupplierProfile()
                && $price->getSupplierProfile()->getId() == $supplierProfile->getId()
                && $price->getFromQuantity() <= $quantity
            ) {
                $bestPrice = $price;
            }
        }

        return $bestPrice;
    }

    public function addPrice(Price $price): static
    {
        $this->prices[] = $price;

        return $this;
    }

    public function getLowestPrice(): ?Price
    {
        return $this->lowestPrice;
    }

    public function setLowestPrice(?Price $lowestPrice): static
    {
        $this->lowestPrice = $lowestPrice;

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
    public function setSamplePrices(array $samplePrices): static
    {
        $this->samplePrices = $samplePrices;

        return $this;
    }

    public function addSamplePrice(Price $samplePrice): static
    {
        $this->samplePrices[] = $samplePrice;

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
     * @param array<Price> $listPrices
     */
    public function setListPrices(array $listPrices): static
    {
        $this->listPrices = $listPrices;

        return $this;
    }

    public function addListPrice(Price $listPrice): static
    {
        $this->listPrices[] = $listPrice;

        return $this;
    }

    /**
     * @return array
     */
    public function getExternalLinks()
    {
        return $this->externalLinks;
    }

    /**
     * @param array $externalLinks
     */
    public function setExternalLinks($externalLinks): static
    {
        $this->externalLinks = $externalLinks;

        return $this;
    }

    public function addExternalLink(ExternalLink $externalLink): static
    {
        $this->externalLinks[] = $externalLink;

        return $this;
    }

    /**
     * @return array<Attribute>
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param array<Attribute> $attributes
     */
    public function setAttributes(array $attributes): static
    {
        $this->attributes = $attributes;

        return $this;
    }

    public function addAttribute(Attribute $attribute): static
    {
        $this->attributes[] = $attribute;

        return $this;
    }

    /**
     * @return array<DeliveryTime>
     */
    public function getDeliveryTimes(): array
    {
        return $this->deliveryTimes;
    }

    /**
     * @param array<DeliveryTime> $deliveryTimes
     */
    public function setDeliveryTimes(array $deliveryTimes): static
    {
        $this->deliveryTimes = $deliveryTimes;

        return $this;
    }

    public function addDeliveryTime(DeliveryTime $deliveryTime): static
    {
        $this->deliveryTimes[] = $deliveryTime;

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

    public function getCarbonFootprint(): ?CarbonFootprint
    {
        return $this->carbonFootprint;
    }

    public function setCarbonFootprint(?CarbonFootprint $carbonFootprint): static
    {
        $this->carbonFootprint = $carbonFootprint;

        return $this;
    }

    public function getCarbonFootprintTextile(): ?CarbonFootprintTextile
    {
        return $this->carbonFootprintTextile;
    }

    public function setCarbonFootprintTextile(?CarbonFootprintTextile $carbonFootprintTextile): static
    {
        $this->carbonFootprintTextile = $carbonFootprintTextile;

        return $this;
    }

    public function getDpp(): ?Dpp
    {
        return $this->dpp;
    }

    public function setDpp(?Dpp $dpp): static
    {
        $this->dpp = $dpp;

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

    public function getInternalReference(): string
    {
        return $this->internalReference;
    }

    public function setInternalReference(string $internalReference): static
    {
        $this->internalReference = $internalReference;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'raw_description' => $this->rawDescription,
            'supplier_reference' => $this->supplierReference,
            'stock' => $this->stock,
            'marking_additional_information' => $this->markingAdditionalInformation,
            'net_weight' => $this->netWeight,
            'gross_weight' => $this->grossWeight,
            'european_article_numbering' => $this->europeanArticleNumbering,
            'mandatory_marking' => $this->mandatoryMarking,
            'main_image' => $this->mainImage,
            'images' => $this->images,
            'keywords' => $this->keywords,
            'supplier_profiles' => $this->supplierProfiles,
            'sizes' => $this->sizes,
            'packaging' => $this->packaging,
            'minimum_quantities' => $this->minimumQuantities,
            'prices' => $this->prices,
            'sample_prices' => $this->samplePrices,
            'list_prices' => $this->listPrices,
            'external_links' => $this->externalLinks,
            'attributes' => $this->attributes,
            'delivery_times' => $this->deliveryTimes,
            'carbon_footprint' => $this->carbonFootprint->jsonSerialize(),
            'carbon_footprint_textile' => $this->carbonFootprint->jsonSerialize(),
            'dpp' => $this->dpp->jsonSerialize(),
        ];
    }
}
