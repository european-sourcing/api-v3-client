<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer\MarkingLight;

use EuropeanSourcing\Apiv3Client\Model\MarkingLight\VariantMarking;
use EuropeanSourcing\Apiv3Client\Normalizer\AbstractCachableNormalizer;

class VariantMarkingNormalizer extends AbstractCachableNormalizer
{
    public function denormalize(array $data): VariantMarking
    {
        /** @var VariantMarking $variantMarking */
        $variantMarking = $this->getCache($data['id']);

        /** @var MarkingNormalizer $markingNormalizer */
        $markingNormalizer = $this->normalizerService->getNormalizer(MarkingNormalizer::class);
        $variantMarking->setMarking($markingNormalizer->denormalize($data['marking']));

        return $variantMarking;
    }

    protected function getNewItem($id): VariantMarking
    {
        $variantMarking = new VariantMarking();

        return $variantMarking->setId($id);
    }
}
