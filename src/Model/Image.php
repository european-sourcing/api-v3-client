<?php

namespace EuropeanSourcing\Apiv3Client\Model;

class Image implements \JsonSerializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $originalFilename;

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

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url): static
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalFilename()
    {
        return $this->originalFilename;
    }

    /**
     * @param string $originalFilename
     */
    public function setOriginalFilename($originalFilename): static
    {
        $this->originalFilename = $originalFilename;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'url' => $this->url,
            'original_filename' => $this->originalFilename
        ];
    }
}
