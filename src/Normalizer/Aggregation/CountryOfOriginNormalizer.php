<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Aggregation;

use EuropeanSourcing\Apiv3Client\Model\Aggregation\CountryOfOrigin;

class CountryOfOriginNormalizer
{
    /**
     * @param array $data
     *
     * @return Country
     */
    public function denormalize(array $data)
    {
        $country = new CountryOfOrigin();
        $country->setCode($data['code']);
        $country->setCount($data['count']);

        return $country;
    }
}
