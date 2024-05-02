<?php

namespace EuropeanSourcing\Apiv3Client\Model\Aggregation;

use EuropeanSourcing\Apiv3Client\Common\AggregableInterface;

class Aggregation implements \JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $rows;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->rows = [];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getRows(): array
    {
        return $this->rows;
    }

    /**
     * @param array $rows
     *
     * @return Aggregation
     */
    public function setRows(array $rows)
    {
        $this->rows = $rows;

        return $this;
    }

    /**
     * @param AggregableInterface $row
     *
     * @return Aggregation
     */
    public function addRow(AggregableInterface $row)
    {
        $this->rows[] = $row;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'rows' => $this->rows
        ];
    }
}
