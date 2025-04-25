<?php

namespace EuropeanSourcing\Apiv3Client\Model\Marking;

class Marking
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $slug;

    /** @var array */
    private $hierarchy;

    /** @var string */
    private $fullHierarchyName;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getHierarchy(): array
    {
        return $this->hierarchy;
    }

    public function setHierarchy(array $hierarchy): static
    {
        $this->hierarchy = $hierarchy;

        return $this;
    }

    public function getFullHierarchyName(): string
    {
        return $this->fullHierarchyName;
    }

    public function setFullHierarchyName(string $fullHierarchyName): static
    {
        $this->fullHierarchyName = $fullHierarchyName;

        return $this;
    }
}
