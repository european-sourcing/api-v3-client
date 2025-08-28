<?php

namespace EuropeanSourcing\Apiv3Client\Model\ProductDetails;

class VariantAttributeGroup
{
    private string $id;

    private string $name;

    private ?string $additionalTextDataType = null;

    private MultipleAttribute|SimpleAttribute $value;

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

    public function getValue(): MultipleAttribute|SimpleAttribute
    {
        return $this->value;
    }

    public function setValue(MultipleAttribute|SimpleAttribute $values): self
    {
        $this->value = $values;

        return $this;
    }
}
