<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\SearchLight;

use EuropeanSourcing\Apiv3Client\Model\ExtremumPrice;

class ExtremumPriceNormalizer extends AbstractSearchLightNormalizer
{
    /**
     * @param array{supplier_profile_id: int, lowest_price: float, highest_price: float} $data
     */
    public function denormalize(array $data): ExtremumPrice
    {
        $extremumPrice = new ExtremumPrice();
        $extremumPrice->setSupplierProfileId($data['supplier_profile_id']);
        $extremumPrice->setLowestPrice($data['lowest_price']);
        $extremumPrice->setHighestPrice($data['highest_price']);

        return $extremumPrice;
    }
}
