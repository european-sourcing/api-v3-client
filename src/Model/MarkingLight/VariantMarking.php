<?php

namespace EuropeanSourcing\Apiv3Client\Model\MarkingLight;

use EuropeanSourcing\Apiv3Client\Common\Collection;

class VariantMarking
{
    private int $id;

    private Marking $marking;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getMarking(): Marking
    {
        return $this->marking;
    }

    public function setMarking(Marking $marking): static
    {
        $this->marking = $marking;

        return $this;
    }
}
