<?php

namespace EuropeanSourcing\Apiv3Client\Model\SearchLight;

class SupplierProfile
{
    private int $id;

    private ?string $name = null;

    private ?string $countryCode = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): SupplierProfile
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): SupplierProfile
    {
        $this->name = $name;

        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): SupplierProfile
    {
        $this->countryCode = $countryCode;

        return $this;
    }
}
