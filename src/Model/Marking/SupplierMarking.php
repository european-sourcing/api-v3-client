<?php

namespace Medialeads\Apiv3Client\Model\Marking;

class SupplierMarking
{
    /** @var int */
    private $id;

    /** @var string */
    private $code;

    /** @var string */
    private $comment;

    /** @var string */
    private $nameComplement;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getNameComplement(): string
    {
        return $this->nameComplement;
    }

    public function setNameComplement(string $nameComplement): self
    {
        $this->nameComplement = $nameComplement;

        return $this;
    }
}
