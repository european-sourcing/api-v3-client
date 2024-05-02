<?php

namespace EuropeanSourcing\Apiv3Client\Request;

use EuropeanSourcing\Apiv3Client\Common\RequestElementInterface;
use EuropeanSourcing\Apiv3Client\Exception\InvalidArgumentException;

class Attribute extends AbstractIncludeExclude implements RequestElementInterface
{
    /**
     * @var string
     */
    private $operator;

    /**
     * @var array
     */
    private $attributeIds;

    /**
     * @param array $attributeIds
     * @param string $operator
     */
    public function __construct(array $attributeIds, string $operator)
    {
        $this->operator = $operator;
        $this->attributeIds = $attributeIds;
    }

    /**
     * @return array
     *
     * @throws InvalidArgumentException
     */
    public function export()
    {
        if (!in_array($this->operator, ['and', 'or'])) {
            throw new InvalidArgumentException(sprintf('Invalid operator "%s"', $this->operator));
        }

        return [
            'attribute_id' => [
                $this->getAction() => [
                    'ids' => $this->attributeIds,
                    'operator' => $this->operator
                ]
            ]
        ];
    }
}
