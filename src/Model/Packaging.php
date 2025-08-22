<?php

namespace EuropeanSourcing\Apiv3Client\Model;

class Packaging implements \JsonSerializable
{
    /**
     * @var int
     */
    private $id;

     private ?int $innerQuantity = null;

    private ?Packaging $parent = null;

    private ?int $parentId = null;

    private ?string $type = null;

    private ?float $weight = null;

    private array $sizes = [];

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

    public function getInnerQuantity(): ?int
    {
        return $this->innerQuantity;
    }

    public function setInnerQuantity(?int $innerQuantity): static
    {
        $this->innerQuantity = $innerQuantity;

        return $this;
    }

    public function getParent(): ?Packaging
    {
        return $this->parent;
    }

    public function setParent(?Packaging $parent): static
    {
        $this->parent = $parent;

        return $this;
    }

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function setParentId(?int $parentId): static
    {
        $this->parentId = $parentId;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(?float $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return array<Size>
     */
    public function getSizes(): array
    {
        return $this->sizes;
    }

    /**
     * @param array<Size> $sizes
     */
    public function setSizes(array $sizes): static
    {
        $this->sizes = $sizes;

        return $this;
    }

    public function addSize(Size $size): static
    {
        $this->sizes[] = $size;

        return $this;
    }

    /**
     * @return string
     */
    public function getFormatedSizes()
    {
        $values = array_map(function(Size $size) {
            return round($size->getValue(), 2);
        }, $this->sizes);

        return implode(' x ', $values);
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'inner_quantity' => $this->innerQuantity,
            'type' => $this->type,
            'weight' => $this->weight,
            'sizes' => $this->sizes,
            'parent' => $this->parent
        ];
    }
}
