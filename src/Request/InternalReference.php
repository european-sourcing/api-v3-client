<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;
use EuropeanSourcing\Apiv3Client\Exception\InvalidArgumentException;

class InternalReference extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var array
     */
    private $internalReferences;

    /**
     * @var string
     */
    private $type;

    public function __construct(array $internalReferences, string $type)
    {
        $this->type = $type;
        $this->internalReferences = $internalReferences;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function export(): array
    {
        if (!in_array($this->type, ['strict', 'like'])) {
            throw new InvalidArgumentException(sprintf('Invalid type "%s"', $this->type));
        }

        return [
            'internal_reference' => [
                $this->getAction() => $this->internalReferences,
                'type' => $this->type
            ]
        ];
    }
}
