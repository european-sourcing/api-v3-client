<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use InvalidArgumentException;

abstract class AbstractIncludeExclude
{
    public const INCLUDE = 'include';
    public const EXCLUDE = 'exclude';
    private const AUTHORIZED_ACTIONS = [self::INCLUDE, self::EXCLUDE];

    private string $action = self::INCLUDE;

    public function getAction(): string
    {
        return $this->action;
    }

    public function setAction(string $action): static
    {
        if (false === in_array($this->action, self::AUTHORIZED_ACTIONS)) {
            throw new InvalidArgumentException(
                'Invalid action parameter value. Got ' . $action . ' expected values '
                . implode(' or ', self::AUTHORIZED_ACTIONS)
            );
        }

        $this->action = $action;

        return $this;
    }
}
