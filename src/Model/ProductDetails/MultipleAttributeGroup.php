<?php

namespace EuropeanSourcing\Apiv3Client\Model\ProductDetails;

class MultipleAttributeGroup
{
    private string $id;

    private string $name;

    private ?string $additionalTextDataType = null;

    /** @var array<string, MultipleAttribute> */
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

    public function getAdditionalTextDataType(): ?string
    {
        return $this->additionalTextDataType;
    }

    public function setAdditionalTextDataType(?string $additionalTextDataType): self
    {
        $this->additionalTextDataType = $additionalTextDataType;

        return $this;
    }

    /**
     * @return array<string, MultipleAttribute>
     */
    public function getValues(): array
    {
        return $this->values;
    }

    public function addValue(MultipleAttribute $value): self
    {
        $this->values[$value->getIds() ? implode('_', $value->getIds()) : ''] = $value;

        return $this;
    }
}
