<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Service\NormalizerService;

abstract class AbstractNormalizer implements NormalizerInterface
{
    protected NormalizerService $normalizerService;

    public function __construct(NormalizerService $normalizerService)
    {
        $this->normalizerService = $normalizerService;
    }
}
