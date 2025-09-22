<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Service\NormalizerService;

interface NormalizerInterface
{
    public function __construct(NormalizerService $normalizerService);

    public function denormalize(array $data): object|array;
}
