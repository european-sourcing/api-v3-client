<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\Aggregation;

use EuropeanSourcing\Apiv3Client\Model\Aggregation\Aggregation;

class AggregationNormalizer
{
    public function denormalize(array $data, string $objectNormalizerName): Aggregation
    {
        $aggregation = new Aggregation($data['name']);

        if (false === empty($data['rows'])) {
            $objectNormalizer = new $objectNormalizerName();

            foreach ($data['rows'] as $row) {
                $aggregation->addRow($objectNormalizer->denormalize($row));
            }
        }

        return $aggregation;
    }
}
