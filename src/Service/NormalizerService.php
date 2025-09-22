<?php

namespace EuropeanSourcing\Apiv3Client\Service;

use EuropeanSourcing\Apiv3Client\Normalizer\NormalizerInterface;

class NormalizerService
{
    /** @var array<NormalizerInterface> */
    private array $normalizers = [];

    /**
     * @param class-string<T> $class
     *
     * @return NormalizerInterface<T>
     *
     * @template T of object
     */
    public function getNormalizer(string $class): NormalizerInterface
    {
        if (false === array_key_exists($class, $this->normalizers)) {
            $this->normalizers[$class] = new $class($this);
        }

        return $this->normalizers[$class];
    }
}
