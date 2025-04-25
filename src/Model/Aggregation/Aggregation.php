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

    public function getRows(): array
    {
        return $this->rows;
    }

    public function setRows(array $rows): static
    {
        $this->rows = $rows;

        return $this;
    }

    public function addRow(AggregableInterface $row): static
    {
        $this->rows[] = $row;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'rows' => $this->rows
        ];
    }
}
