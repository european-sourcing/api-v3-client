<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Aggregation;

use EuropeanSourcing\Apiv3Client\Model\Aggregation\Country;

class CountryNormalizer
{
    public function denormalize(array $data): Country
    {
        $country = new Country();
        $country->setCode($data['code']);
        $country->setCount($data['count']);

        return $country;
    }
}
