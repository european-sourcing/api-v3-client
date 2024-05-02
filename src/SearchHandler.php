<?php

namespace EuropeanSourcing\Apiv3Client;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;

class SearchHandler
{
    /**
     * @var array
     */
    private $filters;

    public function __construct()
    {
        $this->filters = [];
    }

    /**
     * @param RequestElementInterface $element
     *
     * @return SearchHandler
     */
    public function add(RequestElementInterface $element)
    {
        $this->filters += $element->export();

        return $this;
    }

    /**
     * @return array
     */
    public function export()
    {
        return $this->filters;
    }
}
