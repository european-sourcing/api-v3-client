<?php

namespace EuropeanSourcing\Apiv3Client\Common;

use Iterator;

class Collection implements Iterator
{
    private array $items;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function add(string $key, $item): static
    {
        $this->items[$key] = $item;

        return $this;
    }

    public function get(string $key)
    {
        return $this->items[$key] ?? null;
    }

    /**
     * @inheritdoc
     */
    public function current(): mixed
    {
        return current($this->items);
    }

    /**
     * @inheritdoc
     */
    public function next(): void
    {
        next($this->items);
    }

    /**
     * @inheritdoc
     */
    public function key(): mixed
    {
        return key($this->items);
    }

    /**
     * @inheritdoc
     */
    public function valid(): bool
    {
        return key($this->items) !== null;
    }

    /**
     * @inheritdoc
     */
    public function rewind(): void
    {
        reset($this->items);
    }
}
