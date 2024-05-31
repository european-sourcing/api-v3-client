<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Marking;

use EuropeanSourcing\Apiv3Client\Model\Marking\MarkingPrice;

class MarkingPriceNormalizer
{
    public function denormalize(array $data): MarkingPrice
    {
        $markingPrice = new MarkingPrice();
        $markingPrice->setId($data['id']);
        $markingPrice->setFromQuantity($data['from_quantity']);
        $markingPrice->setValue($data['value']);
        $markingPrice->setCalculationValue($data['calculation_value']);

        return $markingPrice;
    }
}
