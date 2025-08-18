<?php

namespace EuropeanSourcing\Apiv3Client\Model\Marking;

class SupplierMarking
{
    /** @var int */
    private $id;

    /** @var string */
    private $code;

    private ?string $comment = null;

    private ?string $nameComplement = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getNameComplement(): ?string
    {
        return $this->nameComplement;
    }

    public function setNameComplement(?string $nameComplement): static
    {
        $this->nameComplement = $nameComplement;

        return $this;
    }
}
