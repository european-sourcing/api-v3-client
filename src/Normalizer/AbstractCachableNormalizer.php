<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

abstract class AbstractCachableNormalizer extends AbstractNormalizer
{
    /** @var array<string|int, object> */
    private array $cache = [];

    abstract protected function getNewItem($id): object;

    protected function getCache($id): object
    {
        if (false === array_key_exists($id, $this->cache)) {
            $this->cache[$id] = $this->getNewItem($id);
        }

        return $this->cache[$id];
    }
}
