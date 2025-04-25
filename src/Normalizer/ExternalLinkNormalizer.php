<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\ExternalLink;

class ExternalLinkNormalizer
{
    public function denormalize(array $data): ExternalLink
    {
        $externalLink = new ExternalLink();
        $externalLink->setId($data['id']);
        $externalLink->setType($data['type']);
        $externalLink->setUrl($data['url']);

        return $externalLink;
    }
}
