<?php

namespace Medialeads\Apiv3Client\Request;

use Medialeads\Apiv3Client\Common\RequestElementInterface;

class Query implements RequestElementInterface
{
    /**
     * @var string
     */
    private $query;

    /**
     * @param string $query
     */
    public function __construct(string $query)
    {
        $this->query = $query;
    }

    /**
     * @return array
     */
    public function export()
    {
        return [
            'query' => $this->query
        ];
    }
}
