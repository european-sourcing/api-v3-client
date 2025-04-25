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

    /**
     * @var int
     */
    private $stock;

    /**
     * @var string
     */
    private $markingAdditionalInformation;

    /**
     * @var float
     */
    private $netWeight;

    /**
     * @var float
     */
    private $grossWeight;

    /**
     * @var string
     */
    private $europeanArticleNumbering;

    /**
     * @var bool
     */
    private $mandatoryMarking;

    /**
     * @var Image
     */
    private $mainImage;

    /**
     * @var array
     */
    private $images;

    /**
     * @var array
     */
    private $keywords;

    /**
     * @var array
     */
    private $supplierProfiles;

    /**
     * @var array
     */
    private $sizes;

    /**
     * @var Packaging
     */
    private $packaging;

    /**
     * @var array
     */
    private $minimumQuantities;

    /**
     * @var array
     */
    private $prices;

    /**
     * @var Price
     */
    private $lowestPrice;

    /**
     * @var array
     */
    private $samplePrices;

    /**
     * @var array
     */
    private $listPrices;

    /**
     * @var array
     */
    private $externalLinks;

    /**
     * @var array
     */
    private $attributes;

    /**
     * @var array
     */
    private $deliveryTimes;

    private bool $hasPlanetImpact;

    private ?CarbonFootprint $carbonFootprint = null;

    private ?CarbonFootprintTextile $carbonFootprintTextile = null;

    private ?Dpp $dpp;

    /**
     * @var Product
     */
    private $product;

    private string $internalReference;

    public function __construct()
    {
        $this->minimumQuantities = [];
        $this->prices = [];
        $this->attributes = [];
        $this->supplierProfiles = [];
    }

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

    /**
     * @return int
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param int $stock
     */
    public function setStock($stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * @return string
     */
    public function getMarkingAdditionalInformation()
    {
        return $this->markingAdditionalInformation;
    }

    /**
     * @param string $markingAdditionalInformation
     */
    public function setMarkingAdditionalInformation($markingAdditionalInformation): static
    {
        $this->markingAdditionalInformation = $markingAdditionalInformation;

        return $this;
    }

    /**
     * @return array
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param array $keywords
     */
    public function setKeywords($keywords): static
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
     * @return array
     */
    public function getSupplierProfiles()
    {
        return $this->supplierProfiles;
    }

    /**
     * @param array $supplierProfiles
     */
    public function setSupplierProfiles($supplierProfiles): static
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
     * @return array
     */
    public function getSizes()
    {
        return $this->sizes;
    }

    /**
     * @param array $sizes
     */
    public function setSizes($sizes): static
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

    /**
     * @return float
     */
    public function getNetWeight()
    {
        return $this->netWeight;
    }

    /**
     * @param float $netWeight
     */
    public function setNetWeight($netWeight): static
    {
        $this->netWeight = $netWeight;

        return $this;
    }

    /**
     * @return float
     */
    public function getGrossWeight()
    {
        return $this->grossWeight;
    }

    /**
     * @param float $grossWeight
     */
    public function setGrossWeight($grossWeight): static
    {
        $this->grossWeight = $grossWeight;

        return $this;
    }

    /**
     * @return string
     */
    public function getEuropeanArticleNumbering()
    {
        return $this->europeanArticleNumbering;
    }

    /**
     * @param string $europeanArticleNumbering
     */
    public function setEuropeanArticleNumbering($europeanArticleNumbering): static
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

    /**
     * @return Image
     */
    public function getMainImage()
    {
        return $this->mainImage;
    }

    /**
     * @param Image $mainImage
     */
    public function setMainImage($mainImage): static
    {
        $this->mainImage = $mainImage;

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

    public function addImage(Image $image): static
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * @return Packaging
     */
    public function getPackaging()
    {
        return $this->packaging;
    }

    /**
     * @param Packaging $packaging
     */
    public function setPackaging($packaging): static
    {
        $this->packaging = $packaging;

        return $this;
    }

    /**
     * @return array
     */
    public function getMinimumQuantities()
    {
        return $this->minimumQuantities;
    }

    /**
     * @param array $minimumQuantities
     */
    public function setMinimumQuantities($minimumQuantities): static
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
        /** @var Price $price */
        foreach ($this->prices as $price) {
            if ((null === $lowestQuantity) || ($price->getFromQuantity() < $lowestQuantity)) {
                $lowestQuantity = $price->getFromQuantity();
            }
        }

        return $lowestQuantity;
    }

    /**
     * @return array
     */
    public function getPrices()
    {
        return $this->prices;
    }

    public function setPrice(Price $price): static
    {
        $this->price = $price;

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

        /** @var Price $price */
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

        /** @var Price $price */
        foreach ($this->prices as $price) {
            if (
                $price->getSupplierProfile()->getId() == $supplierProfile->getId()
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

    /**
     * @return Price
     */
    public function getLowestPrice()
    {
        return $this->lowestPrice;
    }

    public function setLowestPrice(Price $lowestPrice): static
    {
        $this->lowestPrice = $lowestPrice;

        return $this;
    }

    /**
     * @return array
     */
    public function getSamplePrices()
    {
        return $this->samplePrices;
    }

    /**
     * @param array $samplePrices
     */
    public function setSamplePrices($samplePrices): static
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
     * @return array
     */
    public function getListPrices()
    {
        return $this->listPrices;
    }

    /**
     * @param array $listPrices
     */
    public function setListPrices($listPrices): static
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
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     */
    public function setAttributes($attributes): static
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
     * @return array
     */
    public function getDeliveryTimes()
    {
        return $this->deliveryTimes;
    }

    /**
     * @param array $deliveryTimes
     */
    public function setDeliveryTimes($deliveryTimes): static
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
