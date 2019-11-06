<?php

namespace Medialeads\Apiv3Client;

use Medialeads\Apiv3Client\Common\RequestElementInterface;
use Medialeads\Apiv3Client\Request\AllReference;
use Medialeads\Apiv3Client\Request\Attribute;
use Medialeads\Apiv3Client\Request\Brand;
use Medialeads\Apiv3Client\Request\Category;
use Medialeads\Apiv3Client\Request\CountryOfOrigin;
use Medialeads\Apiv3Client\Request\HasMarking;
use Medialeads\Apiv3Client\Request\Id;
use Medialeads\Apiv3Client\Request\InternalReference;
use Medialeads\Apiv3Client\Request\Label;
use Medialeads\Apiv3Client\Request\LastIndexed;
use Medialeads\Apiv3Client\Request\Marking;
use Medialeads\Apiv3Client\Request\Not;
use Medialeads\Apiv3Client\Request\Price;
use Medialeads\Apiv3Client\Request\Query;
use Medialeads\Apiv3Client\Request\StockGreaterThan;
use Medialeads\Apiv3Client\Request\Supplier;
use Medialeads\Apiv3Client\Request\SupplierBaseReference;
use Medialeads\Apiv3Client\Request\SupplierProfile;
use Medialeads\Apiv3Client\Request\SupplierReference;
use Medialeads\Apiv3Client\Request\Variant;

class QueryBuilder
{
    public function allReference(string $type, array $references): AllReference
    {
        return new AllReference($type, $references);
    }

    public function attribute(string $operator, array $attributeIds): Attribute
    {
        return new Attribute($operator, $attributeIds);
    }

    public function brand(array $brandIds): Brand
    {
        return new Brand($brandIds);
    }

    public function category(array $categoryIds): Category
    {
        return new Category($categoryIds);
    }

    public function countryOfOrigin(array $countryOfOrigins): CountryOfOrigin
    {
        return new CountryOfOrigin($countryOfOrigins);
    }

    public function hasMarking(bool $hasMarking): HasMarking
    {
        return new HasMarking($hasMarking);
    }

    public function id(array $ids): Id
    {
        return new Id($ids);
    }

    public function internalReference(string $type, array $internalReferences): InternalReference
    {
        return new InternalReference($type, $internalReferences);
    }

    public function label(array $labelIds): Label
    {
        return new Label($labelIds);
    }

    public function lastIndexed(string $type, \DateTime $date): LastIndexed
    {
        return new LastIndexed($type, $date);
    }

    public function marking(array $markingIds): Marking
    {
        return new Marking($markingIds);
    }

    public function not(RequestElementInterface $element): Not
    {
        return new Not($element);
    }

    public function price(float $minPrice, float $maxPrice): Price
    {
        return new Price($minPrice, $maxPrice);
    }

    public function query(string $query): Query
    {
        return new Query($query);
    }

    public function stockGreaterThan(int $stockGreaterThan): StockGreaterThan
    {
        return new StockGreaterThan($stockGreaterThan);
    }

    public function supplier(array $supplierIds): Supplier
    {
        return new Supplier($supplierIds);
    }

    public function supplierBaseReference(string $type, array $supplierBaseReferences): SupplierBaseReference
    {
        return new SupplierBaseReference($type, $supplierBaseReferences);
    }

    public function supplierProfile(array $supplierProfileIds): SupplierProfile
    {
        return new SupplierProfile($supplierProfileIds);
    }

    public function supplierReference(string $type, array $supplierReferences): SupplierReference
    {
        return new SupplierReference($type, $supplierReferences);
    }

    public function variant(array $variantIds): Variant
    {
        return new Variant($variantIds);
    }
}
