<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;
use EuropeanSourcing\Apiv3Client\Exception\InvalidArgumentException;

class AllReference implements RequestElementInterface
{
    /**
     * @var array
     */
    private $allReferences;

    /**
     * @var string
     */
    private $type;

    /**
     * @param array $allReferences
     * @param string $type
     */
    public function __construct(array $allReferences, string $type)
    {
        $this->type = $type;
        $this->allReferences = $allReferences;
    }

    /**
     * @return array
     *
     * @throws InvalidArgumentException
     */
    public function export()
    {
        if (!in_array($this->type, ['strict', 'like'])) {
            throw new InvalidArgumentException(sprintf('Invalid type "%s"', $this->type));
        }

        return [
            'all_reference' => [
                'include' => $this->allReferences,
                'type' => $this->type
            ]
        ];
    }
}
