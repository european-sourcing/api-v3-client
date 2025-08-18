<?php

namespace EuropeanSourcing\Apiv3Client\Model\Marking;

class SupplierOptionTranslation
{
    /** @var string */
    private $lang;

    /** @var string */
    private $name;

    private ?string $comment = null;

    public function getLang(): string
    {
        return $this->lang;
    }

    public function setLang(string $lang): static
    {
        $this->lang = $lang;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }
}
