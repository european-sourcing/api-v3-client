<?php

namespace Medialeads\Apiv3Client\Normalizer\Aggregation;

use Medialeads\Apiv3Client\Model\Aggregation\CountryOfOrigin;

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
