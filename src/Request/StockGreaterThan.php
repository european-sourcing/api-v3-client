<?php

namespace Medialeads\Apiv3Client\Request;

use Medialeads\Apiv3Client\Common\RequestElementInterface;

class StockGreaterThan implements RequestElementInterface
{
    /**
     * @var int
     */
    private $stockGreaterThan;

    /**
     * @param int $stockGreaterThan
     */
    public function __construct(int $stockGreaterThan)
    {
        $this->stockGreaterThan = $stockGreaterThan;
    }

    /**
     * @return array
     */
    public function export()
    {
        return [
            'stock_greater_than' => $this->stockGreaterThan
        ];
    }
}
