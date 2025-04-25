<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Aggregation;

use EuropeanSourcing\Apiv3Client\Model\Aggregation\CountryOfOrigin;

class CountryOfOriginNormalizer
{
    public function denormalize(array $data): CountryOfOrigin
    {
        $country = new CountryOfOrigin();
        $country->setCode($data['code']);
        $country->setCount($data['count']);

        return $country;
    }
}
