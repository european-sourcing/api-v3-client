<?php

namespace EuropeanSourcing\Apiv3Client\Service;

use EuropeanSourcing\Apiv3Client\Normalizer\SearchLight\SearchLightNormalizerInterface;

class NormalizerService
{
    /** @var array<SearchLightNormalizerInterface> */
    private array $normalizers = [];

    public function getNormalizer(string $class): SearchLightNormalizerInterface
    {
        if (false === array_key_exists($class, $this->normalizers)) {
            $this->normalizers[$class] = new $class($this);
        }

        return $this->normalizers[$class];
    }
}
