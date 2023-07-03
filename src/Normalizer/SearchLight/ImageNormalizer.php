<?php

namespace Medialeads\Apiv3Client\Normalizer\SearchLight;

use Medialeads\Apiv3Client\Model\SearchLight\Image;

class ImageNormalizer extends AbstractSearchLightCachableNormalizer
{
    protected function getNewItem($id): Image
    {
        $image = new Image();

        return $image->setId($id);
    }

    /**
     * @param array{id: int, url: string} $data
     */
    public function denormalize(array $data): Image
    {
        /** @var Image $image */
        $image = $this->getCache($data['id']);
        $image->setUrl($data['url']);

        return $image;
    }
}
