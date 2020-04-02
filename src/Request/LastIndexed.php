<?php

namespace Medialeads\Apiv3Client\Request;

use Medialeads\Apiv3Client\Common\RequestElementInterface;
use Medialeads\Apiv3Client\Exception\InvalidArgumentException;

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
     * @param \DateTime $date
     * @param string $type
     */
    public function __construct(\DateTime $date, string $type)
    {
        $this->type = $type;
        $this->date = $date;
    }

    /**
     * @return array
     * @throws InvalidArgumentException
     */
    public function export()
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
