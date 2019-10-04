<?php
namespace EasyWeb\FrontBundle\ElasticSearch\Model;

class Search implements \Iterator
{
    /**
     * Recherche texte
     * @var string
     */
    protected $query;

    /**
     * Recherche simple ou recherche avec cycle fournisseur
     * @var boolean
     */
    protected $isSimple;

    /**
     * Renvoi les aggregations avec la recherche (ou pas)
     * @var boolean
     */
    protected $withAggs;

    /**
     * Renvoi le minimum
     * @var boolean
     */
    protected $isMinimal;

    /**
     * Ne renvoi que les Ids (pour ne pas surcharger)
     * @var boolean
     */
    protected $onlyIds;

    /**
     * L'id du pays acceptant le sourcing (supplier.sourcings.idLocation)
     * @var integer
     */
    protected $locationId;

    /**
     * L'id du pays d'origine du supplier (supplier.idLocation)
     * @var integer
     */
    protected $countryId;

    /**
     * Recherche par prix min
     * @var float
     */
    protected $minPrice;

    /**
     * Recherche par prix max
     * @var float
     */
    protected $maxPrice;

    /**
     * Recherche par catégorie
     * @var array
     */
    protected $category;

    /**
     * Rechercher plusieurs fournisseurs
     * @var array
     */
    protected $supplierIds;

    /**
     * Recherche par marque
     * @var integer
     */
    protected $brandId;

    /**
     * Les Ids des attributs à rechercher
     * @var array of integer
     */
    protected $attributeIds;

    /**
     * Nouveautés ?
     * @var boolean
     */
    protected $isNew;

    /**
     * Que les produits avec du stock
     * @var boolean
     */
    protected $hasStock;

    /**
     * Exclusion d'Ids
     * @var array
     */
    protected $notIds;

    /**
     * Inclusion d'Ids
     * @var unknown
     */
    protected $ids;

    /**
     * @var array
     */
    protected $variantIds;

    /**
     * Pour l'iterator
     * @var array
     */
    protected $parameters;

    /**
     * @var bool
     */
    protected $mewSearch;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->query        = null;
        $this->supplierIds = null;
        $this->brandId      = null;
        $this->category     = null;
        $this->locationId   = null;
        $this->countryId    = null;
        $this->attributeIds = null;
        $this->hasStock     = null;
        $this->isNew        = null;
        $this->minPrice     = null;
        $this->maxPrice     = null;
        $this->notIds       = null;
        $this->ids          = null;
        $this->isSimple     = false;
        $this->withAggs     = true;
        $this->mewAggs      = true;
        $this->onlyIds      = false;
        $this->isMinimal    = false;
        $this->mewSearch    = false;
    }

    /**
     * Pas les même noms entre elastic et myeasyweb, ici c'est myeasyweb
     */
    public function getAllparameters()
    {
        $ids = $this->getIds();
        $notIds = $this->getNotIds();

        if ( (!empty($ids)) && (!empty($notIds)) ) {
            $this->ids = array_diff($ids, $notIds);
            $this->notIds = null;
        }

        $this->parameters = array(
            'query' => $this->getQuery(),
            'category' => [$this->getCategory()],
            'brand' => $this->getBrandId(),
            's' => $this->getSupplierIds(),
            'price_min' => $this->getMinPrice(),
            'price_max' => $this->getMaxPrice(),
            'stock' => $this->getHasStock(),
            'not_ids' => $this->getNotIds(),
            'ids' => $this->getIds()
        );

        return $this->parameters;
    }

    /**
     * Pas les même noms entre elastic et myeasyweb, ici c'est elastic
     */
    public function getElasticparameters()
    {
        $ids = $this->getIds();
        $notIds = $this->getNotIds();

        if ( (!empty($ids)) && (!empty($notIds)) ) {
            $this->ids = array_diff($ids, $notIds);
            $this->notIds = null;
        }

        $this->parameters = array(
            'q' => $this->getQuery(),
            'c' => [$this->getCategory()],
            'b' => $this->getBrandId(),
            's' => $this->getSupplierIds(),
            'prix_min' => $this->getMinPrice(),
            'prix_max' => $this->getMaxPrice(),
            'withstockonly' => $this->getHasStock(),
            'nouveautes' => $this->getIsNew(),
            'not_ids' => $this->getNotIds(),
            'ids' => $this->getIds(),
            'simple' => (int)$this->isSimple,
            'withaggs' => (int)$this->withAggs,
            'mewAggs' => (int)$this->mewAggs,
            'minimal' => (int)$this->isMinimal,
            'onlyids' => (int)$this->getOnlyIds(),
            'location' => $this->getLocationId(),
            'mewSearch' => (int)$this->mewSearch
        );

        return $this->parameters;
    }

    /**
     * @return false|string
     */
    public function getApiV3Parameters()
    {
        $searchHandler = [];

        // query
        if (!empty($this->query)) {
            $searchHandler['query'] = $this->query;
        }

        // category_id
        if (!empty($this->category)) {
            $searchHandler['category_id']['include']['ids'] = [$this->category];
        }

        // brand_id
        if (!empty($this->brandId)) {
            $searchHandler['brand_id']['include'] = [$this->brandId];
        }

        // supplier_id
        if (!empty($this->supplierIds)) {
            $searchHandler['supplier_profile_id']['include'] = $this->supplierIds;
        }

        if (!empty($this->ids)) {
            $searchHandler['id']['include'] = $this->ids;
        }

        if (!empty($this->variantIds)) {
            $searchHandler['variant_id']['include'] = $this->variantIds;
        }

        if ((!empty($this->minPrice)) || (!empty($this->maxPrice))) {
            $searchHandler['price'] = [];
            if (!empty($this->minPrice)) {
                $searchHandler['price']['min'] = $this->minPrice;
            }
            if (!empty($this->maxPrice)) {
                $searchHandler['price']['max'] = $this->maxPrice;
            }
        }

        if ($this->hasStock === true) {
            $searchHandler['stock_greater_than'] = 0;
        }

        if (!empty($this->notIds)) {
            $searchHandler['id']['exclude'] = $this->notIds;
        }

        $searchHandler['enable_aggregations'] = false;
        if ($this->withAggs === true) {
            $searchHandler['enable_aggregations'] = true;
        }

        $includeFields = [];
        if ($this->onlyIds === true) {
            $includeFields = ['id'];
        }

        /*$location = 'fr';
        switch($this->locationId) {
            case 84: $location = 'fr'; break;
            case 65: $location = 'de'; break;
            //case
        }*/

        /*return \json_encode([
            'include_fields' => $includeFields,
            'search_handlers' => [$searchHandler]
        ]);*/

        return [
            'search_handlers' => [$searchHandler]
        ];
    }

    public function isSearchNotEmpty()
    {
        return ( (!empty($this->query)) || (!empty($this->category))
            || (!empty($this->brandId)) || (!empty($this->minPrice))
            || (!empty($this->maxPrice)) || (!empty($this->hasStock)));
    }

    public function __toString()
    {
        return md5(serialize($this->getElasticparameters()));
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery($query)
    {
        if (!empty($query)) {
            $this->query = $query;
        }
        return $this;
    }

    public function getLocationId()
    {
        return $this->locationId;
    }

    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
        return $this;
    }

    public function getCountryId()
    {
        return $this->countryId;
    }

    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
        return $this;
    }

    public function getMinPrice()
    {
        return $this->minPrice;
    }

    public function setMinPrice($minPrice)
    {
        if (!empty($minPrice)) {
            $this->minPrice = $minPrice;
        }
        return $this;
    }

    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    public function setMaxPrice($maxPrice)
    {
        if (!empty($maxPrice)) {
            $this->maxPrice = $maxPrice;
        }
        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    public function getCategoryIds()
    {
        if (empty($this->category)) {
            return [];
        }

        return [$this->category];
    }

    public function getSupplierIds()
    {
        return $this->supplierIds;
    }

    public function setSupplierIds(array $supplierIds)
    {
        $this->supplierIds = $supplierIds;

        return $this;
    }

    public function getBrandId()
    {
        return $this->brandId;
    }

    public function setBrandId($brandId)
    {
        if (!empty($brandId)) {
            $this->brandId = $brandId;
        }
        return $this;
    }

    public function getAttributeIds()
    {
        return $this->attributeIds;
    }

    public function setAttributeIds(array $attributeIds)
    {
        $this->attributeIds = $attributeIds;
        return $this;
    }

    public function getIsNew()
    {
        return $this->isNew;
    }

    public function setIsNew($isNew)
    {
        $this->isNew = $isNew;
        return $this;
    }

    public function getHasStock()
    {
        return $this->hasStock;
    }

    public function setHasStock($hasStock)
    {
        if (!empty($hasStock)) {
            $this->hasStock = 1;
        }
        return $this;
    }

    public function getNotIds()
    {
        return $this->notIds;
    }

    public function setNotIds(array $notIds)
    {
        $this->notIds = $notIds;
        return $this;
    }

    public function getIds()
    {
        return $this->ids;
    }

    public function setIds($ids)
    {
        $this->ids = $ids;
        $this->notIds = null;
        return $this;
    }

    public function getIsSimple()
    {
        return $this->isSimple;
    }

    public function setIsSimple($isSimple)
    {
        $this->isSimple = $isSimple;
        return $this;
    }

    public function current()
    {
        if (empty($this->parameters)) {
            $this->getAllparameters();
        }

        return current($this->parameters);
    }

    public function key()
    {
        if (empty($this->parameters)) {
            $this->getAllparameters();
        }

        return key($this->parameters);
    }

    public function next()
    {
        if (empty($this->parameters)) {
            $this->getAllparameters();
        }

        return next($this->parameters);
    }

    public function rewind()
    {
        if (empty($this->parameters)) {
            $this->getAllparameters();
        }

        return reset($this->parameters);
    }

    public function valid()
    {
        if (empty($this->parameters)) {
            $this->getAllparameters();
        }

        return key($this->parameters) !== null;
    }

    public function getWithAggs()
    {
        return $this->withAggs;
    }

    public function setWithAggs($withAggs)
    {
        $this->withAggs = $withAggs;
        return $this;
    }

    public function getOnlyIds()
    {
        return $this->onlyIds;
    }

    public function setOnlyIds($onlyIds)
    {
        $this->onlyIds = $onlyIds;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsMinimal()
    {
        return $this->isMinimal;
    }

    /**
     * @param boolean $isMinimal
     */
    public function setIsMinimal($isMinimal)
    {
        $this->isMinimal = $isMinimal;
        return $this;
    }

    /**
     * @return bool
     */
    public function isMewSearch()
    {
        return $this->mewSearch;
    }

    /**
     * @param bool $mewSearch
     * @return Search
     */
    public function setMewSearch($mewSearch)
    {
        $this->mewSearch = $mewSearch;

        return $this;
    }

    /**
     * @return array
     */
    public function getVariantIds(): array
    {
        return $this->variantIds;
    }

    /**
     * @param array $variantIds
     * @return Search
     */
    public function setVariantIds(array $variantIds): Search
    {
        $this->variantIds = $variantIds;

        return $this;
    }
}
