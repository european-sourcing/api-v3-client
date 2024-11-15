<?php

namespace EuropeanSourcing\Apiv3Client;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;
use EuropeanSourcing\Apiv3Client\Request\AllReference;
use EuropeanSourcing\Apiv3Client\Request\Attribute;
use EuropeanSourcing\Apiv3Client\Request\Brand;
use EuropeanSourcing\Apiv3Client\Request\Category;
use EuropeanSourcing\Apiv3Client\Request\CountryCode;
use EuropeanSourcing\Apiv3Client\Request\CountryOfOrigin;
use EuropeanSourcing\Apiv3Client\Request\HasCarbonFootprint;
use EuropeanSourcing\Apiv3Client\Request\HasCarbonFootprintTextile;
use EuropeanSourcing\Apiv3Client\Request\HasDpp;
use EuropeanSourcing\Apiv3Client\Request\HasMarking;
use EuropeanSourcing\Apiv3Client\Request\Id;
use EuropeanSourcing\Apiv3Client\Request\InternalReference;
use EuropeanSourcing\Apiv3Client\Request\Label;
use EuropeanSourcing\Apiv3Client\Request\LastIndexed;
use EuropeanSourcing\Apiv3Client\Request\Marking;
use EuropeanSourcing\Apiv3Client\Request\Not;
use EuropeanSourcing\Apiv3Client\Request\Price;
use EuropeanSourcing\Apiv3Client\Request\Query;
use EuropeanSourcing\Apiv3Client\Request\StockGreaterThan;
use EuropeanSourcing\Apiv3Client\Request\Supplier;
use EuropeanSourcing\Apiv3Client\Request\SupplierBaseReference;
use EuropeanSourcing\Apiv3Client\Request\SupplierProfile;
use EuropeanSourcing\Apiv3Client\Request\SupplierProfileCountryCode;
use EuropeanSourcing\Apiv3Client\Request\SupplierReference;
use EuropeanSourcing\Apiv3Client\Request\Variant;
use EuropeanSourcing\Apiv3Client\Request\VariantMinimumQuantity;

class QueryBuilder
{
    public function allReference(array $references, string $type = 'strict'): AllReference
    {
        return new AllReference($references, $type);
    }

    public function attribute(array $attributeIds, string $operator = 'and'): Attribute
    {
        return new Attribute($attributeIds, $operator);
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

    public function countryCode(string $countryCode): CountryCode
    {
        return new CountryCode($countryCode);
    }

    public function id(array $ids): Id
    {
        return new Id($ids);
    }

    public function internalReference(array $internalReferences, string $type = 'strict'): InternalReference
    {
        return new InternalReference($internalReferences, $type);
    }

    public function label(array $labelIds): Label
    {
        return new Label($labelIds);
    }

    public function lastIndexed(\DateTime $date, string $type = 'since'): LastIndexed
    {
        return new LastIndexed($date, $type);
    }

    public function marking(array $markingIds): Marking
    {
        return new Marking($markingIds);
    }

    public function not(RequestElementInterface $element): Not
    {
        return new Not($element);
    }

    public function price(?float $minPrice, ?float $maxPrice, ?int $quantity, ?bool $onlyOnEstimation): Price
    {
        return new Price($minPrice, $maxPrice, $quantity, $onlyOnEstimation);
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

    public function supplierBaseReference(array $supplierBaseReferences, string $type = 'strict'): SupplierBaseReference
    {
        return new SupplierBaseReference($supplierBaseReferences, $type);
    }

    public function supplierProfile(array $supplierProfileIds): SupplierProfile
    {
        return new SupplierProfile($supplierProfileIds);
    }

    public function supplierReference(array $supplierReferences, string $type = 'strict'): SupplierReference
    {
        return new SupplierReference($supplierReferences, $type);
    }

    public function variant(array $variantIds): Variant
    {
        return new Variant($variantIds);
    }

    public function supplierProfileCountry(string $countryCode): SupplierProfileCountryCode
    {
        return new SupplierProfileCountryCode($countryCode);
    }

    public function variantMinimumQuantity(int $quantity): VariantMinimumQuantity
    {
        return new VariantMinimumQuantity($quantity);
    }

    public function hasCarbonFootprint(bool $hasCarbonFootprint): HasCarbonFootprint
    {
        return new HasCarbonFootprint($hasCarbonFootprint);
    }

    public function hasCarbonFootprintTextile(bool $hasCarbonFootprintTextile): HasCarbonFootprintTextile
    {
        return new HasCarbonFootprintTextile($hasCarbonFootprintTextile);
    }

    public function hasDpp(bool $hasDpp): HasDpp
    {
        return new HasDpp($hasDpp);
    }
}
