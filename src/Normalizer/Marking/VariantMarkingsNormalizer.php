<?php

namespace Medialeads\Apiv3Client\Normalizer\Marking;

use Medialeads\Apiv3Client\Common\Collection;

class VariantMarkingsNormalizer
{
    public function denormalize(array $data): Collection
    {
        $markings = new Collection();
        $markingNormalizer = new VariantMarkingNormalizer();

        foreach ($data as $row) {
            $markings->add($row['id'], $markingNormalizer->denormalize($row));
        }

        return $markings;
    }
}
