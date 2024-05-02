<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\SearchLight;

use EuropeanSourcing\Apiv3Client\Service\NormalizerService;

interface SearchLightNormalizerInterface
{
    public function __construct(NormalizerService $normalizerService);

    /**
     * @return array|object
     */
    public function denormalize(array $data);
}
