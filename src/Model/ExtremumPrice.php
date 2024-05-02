<?php

namespace EuropeanSourcing\Apiv3Client\Model;

class ExtremumPrice
{
    private int $supplierProfileId;

    private float $lowestPrice;

    private float $highestPrice;

    public function getSupplierProfileId(): int
    {
        return $this->supplierProfileId;
    }

    public function setSupplierProfileId(int $supplierProfileId): ExtremumPrice
    {
        $this->supplierProfileId = $supplierProfileId;

        return $this;
    }

    public function getLowestPrice(): float
    {
        return $this->lowestPrice;
    }

    public function setLowestPrice(float $lowestPrice): ExtremumPrice
    {
        $this->lowestPrice = $lowestPrice;

        return $this;
    }

    public function getHighestPrice(): float
    {
        return $this->highestPrice;
    }

    public function setHighestPrice(float $highestPrice): ExtremumPrice
    {
        $this->highestPrice = $highestPrice;

        return $this;
    }
}
