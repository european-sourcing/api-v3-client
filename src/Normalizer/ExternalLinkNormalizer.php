<?php

namespace Medialeads\Normalizer;

use Medialeads\Apiv3Client\Model\ExternalLink;

class ExternalLinkNormalizer
{
    /**
     * @param array $data
     *
     * @return ExternalLink
     */
    public function denormalize(array $data)
    {
        $externalLink = new ExternalLink();
        $externalLink->setId($data['id']);
        $externalLink->setType($data['type']);
        $externalLink->setUrl($data['url']);

        return $externalLink;
    }
}
