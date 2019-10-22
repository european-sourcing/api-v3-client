<?php

namespace Medialeads\Apiv3Client\Request;

use Medialeads\Apiv3Client\Common\RequestElementInterface;

class LastIndexed implements RequestElementInterface
{
    /**
     * @var array
     */
    private $type;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @param string $type
     * @param \DateTime $date
     */
    public function __construct(string $type, \DateTime $date)
    {
        $this->type = $type;
        $this->date = $date;
    }

    /**
     * @return array
     */
    public function export()
    {
        return [
            'last_indexed' => [
                $this->type => $this->date->format('c')
            ]
        ];
    }
}
