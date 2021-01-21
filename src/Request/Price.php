<?php

namespace Medialeads\Apiv3Client\Request;

use Medialeads\Apiv3Client\Common\RequestElementInterface;
use Medialeads\Apiv3Client\Exception\InvalidArgumentException;

class Price implements RequestElementInterface
{
    /**
     * @var float
     */
    private $minPrice;

    /**
     * @var float
     */
    private $maxPrice;

    /**
     * @param string $query
     */
    public function __construct(?float $minPrice, ?float $maxPrice)
    {
        $this->minPrice = $minPrice;
        $this->maxPrice = $maxPrice;
    }

    /**
     * @return array
     *
     * @throws InvalidArgumentException
     */
    public function export()
    {
        if ((null === $this->minPrice) && (null === $this->maxPrice)) {
            throw new InvalidArgumentException(sprintf('You must set a min price or a max price, none given.'));
        }

        $price = [];

        if (null !== $this->minPrice) {
            $price['min'] = $this->minPrice;
        }
        if (null !== $this->maxPrice) {
            $price['max'] = $this->maxPrice;
        }

        return [
            'price' => $price
        ];
    }
}
