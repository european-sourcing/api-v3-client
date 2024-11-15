<?php

namespace EuropeanSourcing\Apiv3Client\Model;

use JsonSerializable;

class Dpp implements JsonSerializable
{
    private ?string $id = null;

    private ?string $url = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): Dpp
    {
        $this->id = $id;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): Dpp
    {
        $this->url = $url;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'url' => $this->url
        ];
    }
}
