<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;
use EuropeanSourcing\Apiv3Client\Exception\InvalidArgumentException;

class SupplierReference extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var array
     */
    private $supplierReferences;

    /**
     * @var string
     */
    private $type;

    public function __construct(array $supplierReferences, string $type)
    {
        $this->type = $type;
        $this->supplierReferences = $supplierReferences;
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
            'supplier_reference' => [
                $this->getAction() => $this->supplierReferences,
                'type' => $this->type
            ]
        ];
    }
}
