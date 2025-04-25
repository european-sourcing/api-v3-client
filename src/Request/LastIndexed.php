<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;
use EuropeanSourcing\Apiv3Client\Exception\InvalidArgumentException;

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

    public function __construct(\DateTime $date, string $type)
    {
        $this->type = $type;
        $this->date = $date;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function export(): array
    {
        if (!in_array($this->type, ['since', 'before'])) {
            throw new InvalidArgumentException(sprintf('Invalid type "%s"', $this->type));
        }

        return [
            'last_indexed' => [
                $this->type => $this->date->format('c')
            ]
        ];
    }
}
