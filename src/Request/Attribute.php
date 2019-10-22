<?php

namespace Medialeads\Apiv3Client\Request;

use Medialeads\Apiv3Client\Common\RequestElementInterface;
use Medialeads\Apiv3Client\Exception\InvalidArgumentException;

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
     */
    public function __construct(string $operator, array $attributeIds)
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
