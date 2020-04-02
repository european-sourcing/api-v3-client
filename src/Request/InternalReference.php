<?php

namespace Medialeads\Apiv3Client\Request;

use Medialeads\Apiv3Client\Common\RequestElementInterface;
use Medialeads\Apiv3Client\Exception\InvalidArgumentException;

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

    /**
     * @param array $internalReferences
     * @param string $type
     */
    public function __construct(array $internalReferences, string $type)
    {
        $this->type = $type;
        $this->internalReferences = $internalReferences;
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
            'internal_reference' => [
                $this->getAction() => $this->internalReferences,
                'type' => $this->type
            ]
        ];
    }
}
