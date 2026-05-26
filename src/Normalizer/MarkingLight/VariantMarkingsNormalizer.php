<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\MarkingLight;

use EuropeanSourcing\Apiv3Client\Common\Collection;
use EuropeanSourcing\Apiv3Client\Model\MarkingLight\VariantMarking;
use EuropeanSourcing\Apiv3Client\Normalizer\AbstractNormalizer;

class VariantMarkingsNormalizer extends AbstractNormalizer
{
    /**
     * @return Collection<VariantMarking>
     */
    public function denormalize(array $data): Collection
    {
        $markings = new Collection();
        /** @var VariantMarkingNormalizer $markingNormalizer */
        $markingNormalizer = $this->normalizerService->getNormalizer(VariantMarkingNormalizer::class);

        foreach ($data as $row) {
            $markings->add($row['id'], $markingNormalizer->denormalize($row));
        }

        return $markings;
    }
}
