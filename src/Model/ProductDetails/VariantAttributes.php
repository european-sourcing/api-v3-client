<?php

namespace EuropeanSourcing\Apiv3Client\Model\ProductDetails;

use EuropeanSourcing\Apiv3Client\Common\SupplierProfileInterface;
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

class VariantAttributes
{
    private int $id;

    private string $internalReference;

    /**
     * @var array<string, array<int>>
     */
    private array $attributes;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

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

    /**
     * @return array<string, array<int>>
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param array<string, array<int>> $attributes
     */
    public function setAttributes(array $attributes): self
    {
        $this->attributes = $attributes;

        return $this;
    }
}
