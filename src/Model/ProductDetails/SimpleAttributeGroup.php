<?php

namespace EuropeanSourcing\Apiv3Client\Model\ProductDetails;

class SimpleAttributeGroup
{
    private string $id;

    private string $name;

    /** @var array<string, SimpleAttribute> */
    private array $values = [];

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return array<string, SimpleAttribute>
     */
    public function getValues(): array
    {
        return $this->values;
    }

    public function addValue(SimpleAttribute $value): self
    {
        $this->values[$value->getId() ?? ''] = $value;

        return $this;
    }
}
