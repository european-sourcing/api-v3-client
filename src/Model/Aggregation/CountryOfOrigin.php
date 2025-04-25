<?php

namespace EuropeanSourcing\Apiv3Client\Model\Aggregation;

use EuropeanSourcing\Apiv3Client\Common\CountableAggregableInterface;

class CountryOfOrigin implements \JsonSerializable, CountableAggregableInterface
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var int
     */
    private $count;

    public function __construct()
    {
        $this->count = 0;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount($count): static
    {
        $this->count = $count;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'code' => $this->code,
            'count' => $this->count
        ];
    }
}
