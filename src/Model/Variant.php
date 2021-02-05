<?php

namespace Medialeads\Apiv3Client\Model;

use Medialeads\Apiv3Client\Common\SupplierProfileInterface;

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

    /**
     * @var Product
     */
    private $product;

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

        if(!empty($this->getAttributes())){
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
     *
     * @return Variant
     */
    public function setId($id)
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
     *
     * @return Variant
     */
    public function setName($name)
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
     *
     * @return Variant
     */
    public function setSlug($slug)
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
     *
     * @return Variant
     */
    public function setDescription($description)
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
     *
     * @return Variant
     */
    public function setRawDescription($rawDescription)
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
     *
     * @return Variant
     */
    public function setSupplierReference($supplierReference)
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
     *
     * @return Variant
     */
    public function setStock($stock)
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
     *
     * @return Variant
     */
    public function setMarkingAdditionalInformation($markingAdditionalInformation)
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
     *
     * @return Variant
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * @param Keyword $keyword
     *
     * @return Variant
     */
    public function addKeyword(Keyword $keyword)
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
     *
     * @return Variant
     */
    public function setSupplierProfiles($supplierProfiles)
    {
        $this->supplierProfiles = $supplierProfiles;

        return $this;
    }

    /**
     * @param SupplierProfile $supplierProfile
     *
     * @return Variant
     */
    public function addSupplierProfile(SupplierProfile $supplierProfile)
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
     *
     * @return Variant
     */
    public function setSizes($sizes)
    {
        $this->sizes = $sizes;

        return $this;
    }

    /**
     * @param Size $size
     *
     * @return Variant
     */
    public function addSize(Size $size)
    {
        $this->sizes[] = $size;

        return $this;
    }

    /**
     * @return string
     */
    public function getFormatedSizes()
    {
        $values = array_map(function(Size $size) {
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
     *
     * @return Variant
     */
    public function setNetWeight($netWeight)
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
     *
     * @return Variant
     */
    public function setGrossWeight($grossWeight)
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
     *
     * @return Variant
     */
    public function setEuropeanArticleNumbering($europeanArticleNumbering)
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
     *
     * @return Variant
     */
    public function setMandatoryMarking($mandatoryMarking)
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
     *
     * @return Variant
     */
    public function setMainImage($mainImage)
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
     *
     * @return Variant
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * @param Image $image
     *
     * @return Variant
     */
    public function addImage(Image $image)
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
     *
     * @return Variant
     */
    public function setPackaging($packaging)
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
     *
     * @return Variant
     */
    public function setMinimumQuantities($minimumQuantities)
    {
        $this->minimumQuantities = $minimumQuantities;

        return $this;
    }

    /**
     * @param MinimumQuantity $minimumQuantity
     *
     * @return Variant
     */
    public function addMinimumQuantity(MinimumQuantity $minimumQuantity)
    {
        $this->minimumQuantities[] = $minimumQuantity;

        return $this;
    }

    /**
     * Minimal command quantity
     *
     * @return MinimumQuantity|mixed|null
     */
    public function getLowestMinimumQuantity()
    {
        $lowestMinimumQuantity = null;
        /** @var MinimumQuantity $minimumQuantity */
        foreach ($this->minimumQuantities as $minimumQuantity) {
            if ((null === $lowestMinimumQuantity) || ($minimumQuantity->getValue() < $lowestMinimumQuantity->getValue())) {
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

    /**
     * @param Price $price
     *
     * @return Variant
     */
    public function setPrice(Price $price)
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

            if ($price->getSupplierProfile()->getId() == $supplierProfile->getId() && $price->getFromQuantity() <= $quantity) {
                $bestPrice = $price;
            }
        }

        return $bestPrice;
    }

    /**
     * @param Price $price
     *
     * @return Variant
     */
    public function addPrice(Price $price)
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

    /**
     * @param Price $lowestPrice
     *
     * @return Variant
     */
    public function setLowestPrice(Price $lowestPrice)
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
     *
     * @return Variant
     */
    public function setSamplePrices($samplePrices)
    {
        $this->samplePrices = $samplePrices;

        return $this;
    }

    /**
     * @param Price $samplePrice
     *
     * @return Variant
     */
    public function addSamplePrice(Price $samplePrice)
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
     *
     * @return Variant
     */
    public function setListPrices($listPrices)
    {
        $this->listPrices = $listPrices;

        return $this;
    }

    /**
     * @param Price $listPrice
     *
     * @return Variant
     */
    public function addListPrice(Price $listPrice)
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
     *
     * @return Variant
     */
    public function setExternalLinks($externalLinks)
    {
        $this->externalLinks = $externalLinks;

        return $this;
    }

    /**
     * @param ExternalLink $externalLink
     *
     * @return Variant
     */
    public function addExternalLink(ExternalLink $externalLink)
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
     *
     * @return Variant
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @param Attribute $attribute
     *
     * @return Variant
     */
    public function addAttribute(Attribute $attribute)
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
     *
     * @return Variant
     */
    public function setDeliveryTimes($deliveryTimes)
    {
        $this->deliveryTimes = $deliveryTimes;

        return $this;
    }

    /**
     * @param DeliveryTime $deliveryTime
     *
     * @return Variant
     */
    public function addDeliveryTime(DeliveryTime $deliveryTime)
    {
        $this->deliveryTimes[] = $deliveryTime;

        return $this;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     * @return Variant
     */
    public function setProduct(Product $product): Variant
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
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
            'delivery_times' => $this->deliveryTimes
        ];
    }
}
