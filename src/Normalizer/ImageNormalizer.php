<?php

namespace Medialeads\Normalizer;

use Medialeads\Apiv3Client\Model\Image;

class ImageNormalizer
{
    /**
     * @param array $data
     *
     * @return Image
     */
    public function denormalize(array $data)
    {
        $image = new Image();
        $image->setId($data['id']);
        $image->setUrl($data['url']);
        $image->setOriginalFilename($data['original_filename']);

        return $image;
    }
}
