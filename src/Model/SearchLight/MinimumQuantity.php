<?php

namespace Medialeads\Apiv3Client\Model\SearchLight;

class MinimumQuantity
{
    private int $value;

    private int $supplierProfileId;

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): MinimumQuantity
    {
        $this->value = $value;

        return $this;
    }

    public function getSupplierProfileId(): int
    {
        return $this->supplierProfileId;
    }

    public function setSupplierProfileId(int $supplierProfileId): MinimumQuantity
    {
        $this->supplierProfileId = $supplierProfileId;

        return $this;
    }
}
