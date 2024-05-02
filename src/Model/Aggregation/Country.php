<?php

namespace EuropeanSourcing\Apiv3Client\Model\Aggregation;

use EuropeanSourcing\Apiv3Client\Common\CountableAggregableInterface;

class Country implements \JsonSerializable, CountableAggregableInterface
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
     *
     * @return Country
     */
    public function setCode($code)
    {
        $this->code = $code;

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
     * @return Country
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'code' => $this->code,
            'count' => $this->count
        ];
    }
}
