<?php

namespace Medialeads\Apiv3Client\Normalizer\SearchLight;

use Medialeads\Apiv3Client\Service\NormalizerService;

abstract class AbstractSearchLightNormalizer implements SearchLightNormalizerInterface
{
    protected NormalizerService $normalizerService;

    public function __construct(NormalizerService $normalizerService)
    {
        $this->normalizerService = $normalizerService;
    }
}
