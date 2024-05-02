<?php

namespace EuropeanSourcing\Apiv3Client\Model\SearchLight;

class Brand
{
    private int $id;

    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Brand
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Brand
    {
        $this->name = $name;

        return $this;
    }
}
