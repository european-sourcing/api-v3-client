<?php

namespace EuropeanSourcing\Apiv3Client\Model;

class DeliveryTime implements \JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $value;

    private array $supplierProfiles = [];

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

    /**
     * @return array<SupplierProfile>
     */
    public function getSupplierProfiles(): array
    {
        return $this->supplierProfiles;
    }

    /**
     * @param array<SupplierProfile> $supplierProfiles
     */
    public function setSupplierProfiles(array $supplierProfiles): static
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
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'value' => $this->value,
            'supplier_profiles' => $this->supplierProfiles
        ];
    }
}
