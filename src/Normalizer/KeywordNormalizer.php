<?php

namespace Medialeads\Apiv3Client\Normalizer;

use Medialeads\Apiv3Client\Model\Keyword;

class KeywordNormalizer
{
    /**
     * @param array $data
     *
     * @return Keyword
     */
    public function denormalize(array $data)
    {
        $keyword = new Keyword();
        $keyword->setId($data['id']);
        $keyword->setName($data['name']);
        $keyword->setSlug($data['slug']);

        return $keyword;
    }
}
