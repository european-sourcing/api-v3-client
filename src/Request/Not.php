<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;
use EuropeanSourcing\Apiv3Client\Exception\InvalidExcludeException;

class Not implements RequestElementInterface
{
    /**
     * @var RequestElementInterface
     */
    private $element;

    public function __construct(RequestElementInterface $element)
    {
        $this->element = $element;
    }

    /**
     * @throws InvalidExcludeException
     */
    public function export(): array
    {
        if (!$this->element instanceof AbstractIncludeExclude) {
            throw new InvalidExcludeException(sprintf('Cannot exclude %s', get_class($this->element)));
        }

        $this->element->setAction(AbstractIncludeExclude::EXCLUDE);

        return $this->element->export();
    }
}
