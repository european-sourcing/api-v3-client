<?php

namespace Medialeads\Apiv3Client\Common;

use EasyWeb\FrontBundle\ElasticSearch\Model\Search;

interface ClientInterface
{
    public function search(Search $model, $language, $page, $perpage, $sort, $sens);

    public function ids(Search $model, $language);

    public function id($id, $language);

    public function categories(Search $model, $language, $schema = 'plain');

    public function brands(Search $model, $language);

    //public function lastModified(Search $model, $language);
}
