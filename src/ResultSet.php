<?php
namespace Medialeads\Apiv3Client\Model;

class ResultSet implements \ArrayAccess,\Iterator, \Countable
{
    /**
     * Tableau de produit
     * @var array
     */
    private $products;

    /**
     * Tableau de totaux (products + references) pour compatibilité
     * @var array
     */
    private $total;

    /**
     * Raccourcis vers le total products
     */
    private $totalProducts;

    /**
     * Facettes categories
     * @var array
     */
    private $categories;

    /**
     * Facette marque
     * @var array
     */
    private $brands;

    /**
     * Facette stock
     * Cette variable contient le nombre de produits ayant du stock
     * @var integer
     */
    private $stock;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = array();
        $this->categories = array();
        $this->brands = array();
        $this->stock = 0;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal(array $total)
    {
        $this->total = $total;

        if (isset($total['products'])) {
            $this->setTotalProducts($total['products']);
        }
        return $this;
    }

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function setProducts($products)
    {
        $this->products = $products;
    }

    public function getTotalProducts()
    {
        return $this->totalProducts;
    }

    public function setTotalProducts($totalProducts)
    {
        $this->totalProducts = $totalProducts;
        return $this;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function setCategories(array $categories)
    {
        $this->categories = $categories;
        return $this;
    }

    public function addCategory($category)
    {
        $this->categories[$category->getIdCategory()] = $category;
    }

    public function getBrands()
    {
        return $this->brands;
    }

    public function setBrands(array $brands)
    {
        $this->brands = $brands;
        return $this;
    }

    public function addBrand($brand)
    {
        $this->brands[$brand->getIdBrand()] = $brand;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
        return $this;
    }

    /**
     * Ajoute un autre resultset à celui-ci
     * par exemple sur les home pour fusionner produits phares et nouveaux produits
     *
     * @param ResultSet $resultset
     */
    public function add(ResultSet $resultset)
    {
        $this->products     = array_merge($this->products, $resultset->getProducts());
        $this->brands       = array_merge($this->brands, $resultset->getBrands());
        $this->categories   = array_merge($this->categories, $resultset->getCategories());
        $this->stock        = $this->stock + $this->getStock();
        $this->total['products']
            = $this->totalProducts
            = $this->totalProducts + $this->getTotalProducts();
    }

    public function offsetExists($offset)
    {
        return isset($this->products[$offset]);
    }

    public function offsetGet($offset)
    {
        if (isset($this->products[$offset])) {
            return $this->products[$offset];
        }
        return null;
    }

    public function offsetSet($offset, $value)
    {
        $this->products[$offset] = $value;
        return $this;
    }

    public function offsetUnset($offset)
    {
        unset($this->products[$offset]);
    }

    public function current()
    {
        return current($this->products);
    }

    public function key()
    {
        return key($this->products);
    }

    public function next()
    {
        return next($this->products);
    }

    public function rewind()
    {
        return reset($this->products);
    }

    public function valid()
    {
        return key($this->products) !== null;
    }

    public function count()
    {
        return count($this->products);
    }
}
