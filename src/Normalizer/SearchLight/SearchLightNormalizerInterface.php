<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\SearchLight;

use EuropeanSourcing\Apiv3Client\Service\NormalizerService;

interface SearchLightNormalizerInterface
{
    public function __construct(NormalizerService $normalizerService);

    public function denormalize(array $data): object|array;
}
