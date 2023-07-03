<?php

namespace Medialeads\Apiv3Client\Model\SearchLight;

class Supplier
{
    private int $id;

    private string $name;

    private string $legalName;

    /** @var array<SupplierProfile> */
    private array $supplierProfiles = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Supplier
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Supplier
    {
        $this->name = $name;

        return $this;
    }

    public function getLegalName(): string
    {
        return $this->legalName;
    }

    public function setLegalName(string $legalName): Supplier
    {
        $this->legalName = $legalName;

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
    public function setSupplierProfiles(array $supplierProfiles): Supplier
    {
        $this->supplierProfiles = $supplierProfiles;

        return $this;
    }

    public function addSupplierProfile(SupplierProfile $supplierProfile): Supplier
    {
        $this->supplierProfiles[] = $supplierProfile;

        return $this;
    }
}
