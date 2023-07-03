<?php

namespace Medialeads\Apiv3Client\Normalizer\SearchLight;

use Medialeads\Apiv3Client\Model\SearchLight\MinimumQuantity;

class MinimumQuantityNormalizer extends AbstractSearchLightNormalizer
{
    /**
     * @param array{value: int, supplier_profile: array} $data
     */
    public function denormalize(array $data): MinimumQuantity
    {
        $minimumQuantity = new MinimumQuantity();
        $minimumQuantity->setValue($data['value']);
        $minimumQuantity->setSupplierProfileId($data['supplier_profile']['id']);

        return $minimumQuantity;
    }
}
