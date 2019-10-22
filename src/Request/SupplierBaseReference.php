<?php

namespace Medialeads\Apiv3Client\Request;

use Medialeads\Apiv3Client\Common\RequestElementInterface;
use Medialeads\Apiv3Client\Exception\InvalidArgumentException;

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
     * @param string $type
     * @param array $supplierBaseReferences
     */
    public function __construct(string $type, array $supplierBaseReferences)
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
