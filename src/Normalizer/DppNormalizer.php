<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\Dpp;

class DppNormalizer
{
    public function denormalize(array $data): ?Dpp
    {
        $id = $data['dpp_id'] ?? null;
        $url = $data['dpp_url'] ?? null;

        if (null === $id && null === $url) {
            return null;
        }

        $dpp = new Dpp();
        $dpp->setId($id);
        $dpp->setUrl($url);

        return $dpp;
    }
}
