<?php

namespace Medialeads\Apiv3Client\Normalizer\Aggregation;

use Medialeads\Apiv3Client\Model\Aggregation\Aggregation;

class AggregationNormalizer
{
    /**
     * @param array $data
     * @param string $objectNormalizerName
     *
     * @return Aggregation
     */
    public function denormalize(array $data, string $objectNormalizerName)
    {
        $aggregation = new Aggregation($data['name']);

        $objectNormalizer = new $objectNormalizerName();

        foreach ($data['rows'] as $row) {
            $aggregation->addRow($objectNormalizer->denormalize($row));
        }

        return $aggregation;
    }
}
