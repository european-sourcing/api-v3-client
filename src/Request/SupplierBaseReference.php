<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;
use EuropeanSourcing\Apiv3Client\Exception\InvalidArgumentException;

class SupplierBaseReference extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var array
     */
    private $supplierBaseReferences;

    /**
     * @var string
     */
    private $type;

    /**
     * @param array $supplierBaseReferences
     * @param string $type
     */
    public function __construct(array $supplierBaseReferences, string $type)
    {
        $this->type = $type;
        $this->supplierBaseReferences = $supplierBaseReferences;
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
            'supplier_base_reference' => [
                $this->getAction() => $this->supplierBaseReferences,
                'type' => $this->type
            ]
        ];
    }
}
