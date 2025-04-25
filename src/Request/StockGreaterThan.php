<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class StockGreaterThan implements RequestElementInterface
{
    /**
     * @var int
     */
    private $stockGreaterThan;

    public function __construct(int $stockGreaterThan)
    {
        $this->stockGreaterThan = $stockGreaterThan;
    }

    public function export(): array
    {
        return [
            'stock_greater_than' => $this->stockGreaterThan
        ];
    }
}
