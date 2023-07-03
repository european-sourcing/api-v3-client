<?php

namespace Medialeads\Apiv3Client\Normalizer\SearchLight;

use Medialeads\Apiv3Client\Service\NormalizerService;

interface SearchLightNormalizerInterface
{
    public function __construct(NormalizerService $normalizerService);

    /**
     * @return array|object
     */
    public function denormalize(array $data);
}
