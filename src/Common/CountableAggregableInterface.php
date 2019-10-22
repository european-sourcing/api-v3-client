<?php

namespace Medialeads\Apiv3Client\Common;

interface CountableAggregableInterface extends AggregableInterface
{
    public function getCount(): int;
}
