<?php

namespace EuropeanSourcing\Apiv3Client\Model\Marking;

class MarkingFee
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $slug;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): MarkingFee
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): MarkingFee
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): MarkingFee
    {
        $this->slug = $slug;

        return $this;
    }
}
