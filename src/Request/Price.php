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
     * @var integer
     */
    private $quantity;

    /**
     * @var bool
     */
    private $onlyOnEstimation;

    /**
     * @param string $query
     */
    public function __construct(?float $minPrice, ?float $maxPrice, ?int $quantity, ?bool $onlyOnEstimation)
    {
        $this->minPrice = $minPrice;
        $this->maxPrice = $maxPrice;
        $this->quantity = $quantity;
        $this->onlyOnEstimation = $onlyOnEstimation;
    }

    /**
     * @return array
     *
     * @throws InvalidArgumentException
     */
    public function export()
    {
        if ((null === $this->quantity) && (null === $this->onlyOnEstimation) && (null === $this->minPrice) && (null === $this->maxPrice)) {
            throw new InvalidArgumentException(sprintf('You must set a min price or a max price, none given.'));
        }

        $price = [];

        if (null !== $this->minPrice) {
            $price['min'] = $this->minPrice;
        }
        if (null !== $this->maxPrice) {
            $price['max'] = $this->maxPrice;
        }

        if (null !== $this->quantity) {
            $price['quantity'] = $this->quantity;
        }

        if (null !== $this->onlyOnEstimation) {
            $price['onlyOnEstimation'] = $this->onlyOnEstimation;
        }

        return [
            'price' => $price
        ];
    }
}
