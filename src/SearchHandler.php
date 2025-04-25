<?php

namespace EuropeanSourcing\Apiv3Client;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class SearchHandler
{
    private array $filters = [];

    public function add(RequestElementInterface $element): static
    {
        $this->filters += $element->export();

        return $this;
    }

    public function export(): array
    {
        return $this->filters;
    }
}
