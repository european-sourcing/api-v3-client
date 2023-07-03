<?php

namespace Medialeads\Apiv3Client\Model\Aggregation;

use Medialeads\Apiv3Client\Common\CountableAggregableInterface;

class Brand implements \JsonSerializable, CountableAggregableInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    private string $slug = '';

    /**
     * @var int
     */
    private $count;

    private ?string $logo = null;

    public function __construct()
    {
        $this->count = 0;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Brand
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Brand
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): Brand
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     *
     * @return Brand
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): Brand
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'count' => $this->count,
            'logo' => $this->logo,
        ];
    }
}
