<?php

namespace EuropeanSourcing\Apiv3Client\Model;

class MinimumQuantity implements \JsonSerializable
{
    /**
     * @var string
     */
    private $value;

    /**
     * @var SupplierProfile
     */
    private $supplierProfile;

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value): static
    {
        $this->value = $value;

        return $this;
    }

    public function getSupplierProfile(): SupplierProfile
    {
        return $this->supplierProfile;
    }

    public function setSupplierProfile(SupplierProfile $supplierProfile): static
    {
        $this->supplierProfile = $supplierProfile;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'value' => $this->value,
            'supplier_profile' => $this->supplierProfile
        ];
    }
}
