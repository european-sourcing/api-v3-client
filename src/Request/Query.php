<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class Query implements RequestElementInterface
{
    /**
     * @var string
     */
    private $query;

    public function __construct(string $query)
    {
        $this->query = $query;
    }

    public function export(): array
    {
        return [
            'query' => $this->query
        ];
    }
}
