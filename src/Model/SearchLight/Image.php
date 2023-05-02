<?php

namespace Medialeads\Apiv3Client\Model\SearchLight;

class Image
{
    private int $id;

    private string $url;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Image
    {
        $this->id = $id;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): Image
    {
        $this->url = $url;

        return $this;
    }
}
