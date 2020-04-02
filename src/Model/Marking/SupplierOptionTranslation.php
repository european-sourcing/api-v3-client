<?php

namespace Medialeads\Apiv3Client\Model\Marking;

class SupplierOptionTranslation
{
    /** @var string */
    private $lang;

    /** @var string */
    private $name;

    /** @var string */
    private $comment;

    /**
     * @return string
     */
    public function getLang(): string
    {
        return $this->lang;
    }

    public function setLang(string $lang): SupplierOptionTranslation
    {
        $this->lang = $lang;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): SupplierOptionTranslation
    {
        $this->name = $name;

        return $this;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): SupplierOptionTranslation
    {
        $this->comment = $comment;

        return $this;
    }
}