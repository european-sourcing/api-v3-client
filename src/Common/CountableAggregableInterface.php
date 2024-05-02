<?php

namespace EuropeanSourcing\Apiv3Client\Common;

interface CountableAggregableInterface extends AggregableInterface
{
    public function getCount(): int;
}
