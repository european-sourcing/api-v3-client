<?php

namespace EuropeanSourcing\Apiv3Client\Model\ProductDetails;

class MultipleAttribute
{
    /** @var array<int>|null */
    private ?array $ids = [];

    private string $name;

    /** @var array<string>|null  */
    private ?array $additionalTextData = null;

    /**
     * @return array<int>|null
     */
    public function getIds(): ?array
    {
        return $this->ids;
    }

    /**
     * @param array<int>|null $ids
     */
    public function setIds(?array $ids): self
    {
        $this->ids = $ids;

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
     * @return array<string>|null
     */
    public function getAdditionalTextData(): ?array
    {
        return $this->additionalTextData;
    }

    /**
     * @param array<string>|null $additionalTextData
     */
    public function setAdditionalTextData(?array $additionalTextData): self
    {
        $this->additionalTextData = $additionalTextData;

        return $this;
    }
}
