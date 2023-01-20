<?php

namespace Medialeads\Apiv3Client\Request;

use Medialeads\Apiv3Client\Common\RequestElementInterface;

class VariantMinimumQuantity implements RequestElementInterface
{
    private int $quantity;

    public function __construct(int $quantity)
    {
        $this->quantity = $quantity;
    }

    public function export(): array
    {
        return [
            'variant_minimum_quantity' => $this->quantity
        ];
    }
}
