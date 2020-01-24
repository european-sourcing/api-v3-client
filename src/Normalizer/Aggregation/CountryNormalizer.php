<?php

namespace Medialeads\Apiv3Client\Normalizer\Aggregation;

use Medialeads\Apiv3Client\Model\Aggregation\Country;

class CountryNormalizer
{
    /**
     * @param array $data
     *
     * @return Country
     */
    public function denormalize(array $data)
    {
        $country = new Country();
        $country->setCode($data['code']);
        $country->setCount($data['count']);

        return $country;
    }
}
