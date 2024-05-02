<?php

namespace EuropeanSourcing\Apiv3Client\Model\Marking;

class SupplierProfile
{
    /** @var int */
    private $id;

    /** @var string */
    private $countryCode;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }
}
