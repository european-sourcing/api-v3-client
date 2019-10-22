<?php

namespace Medialeads\Apiv3Client\Request;

use Medialeads\Apiv3Client\Common\RequestElementInterface;
use Medialeads\Apiv3Client\Exception\InvalidArgumentException;

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

    /**
     * @param string $type
     * @param array $supplierReferences
     */
    public function __construct(string $type, array $supplierReferences)
    {
        $this->type = $type;
        $this->supplierReferences = $supplierReferences;
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
            'supplier_reference' => [
                $this->getAction() => $this->supplierReferences,
                'type' => $this->type
            ]
        ];
    }
}
