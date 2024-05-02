<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\Keyword;

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
        $keyword->setValue($data['value']);
        $keyword->setSlug($data['slug']);

        return $keyword;
    }
}
