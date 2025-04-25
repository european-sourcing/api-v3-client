<?php

namespace EuropeanSourcing\Apiv3Client\Model;

use JsonSerializable;

class CarbonFootprint implements JsonSerializable
{
    private ?float $totalCarbonProduction = null;

    private ?float $totalPackaging = null;

    private ?float $totalLogistic = null;

    private ?float $footprintUsage = null;

    private ?float $footprintEndOfLife = null;

    private ?float $total = null;

    private ?float $score = null;

    private ?string $scoreUnit = null;

    public function getTotalCarbonProduction(): ?float
    {
        return $this->totalCarbonProduction;
    }

    public function setTotalCarbonProduction(?float $totalCarbonProduction): static
    {
        $this->totalCarbonProduction = $totalCarbonProduction;

        return $this;
    }

    public function getTotalPackaging(): ?float
    {
        return $this->totalPackaging;
    }

    public function setTotalPackaging(?float $totalPackaging): static
    {
        $this->totalPackaging = $totalPackaging;

        return $this;
    }

    public function getTotalLogistic(): ?float
    {
        return $this->totalLogistic;
    }

    public function setTotalLogistic(?float $totalLogistic): static
    {
        $this->totalLogistic = $totalLogistic;

        return $this;
    }

    public function getFootprintUsage(): ?float
    {
        return $this->footprintUsage;
    }

    public function setFootprintUsage(?float $footprintUsage): static
    {
        $this->footprintUsage = $footprintUsage;

        return $this;
    }

    public function getFootprintEndOfLife(): ?float
    {
        return $this->footprintEndOfLife;
    }

    public function setFootprintEndOfLife(?float $footprintEndOfLife): static
    {
        $this->footprintEndOfLife = $footprintEndOfLife;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(?float $total): static
    {
        $this->total = $total;

        return $this;
    }

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(?float $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getScoreUnit(): ?string
    {
        return $this->scoreUnit;
    }

    public function setScoreUnit(?string $scoreUnit): static
    {
        $this->scoreUnit = $scoreUnit;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'total_carbon_production' => $this->totalCarbonProduction,
            'total_packaging' => $this->totalPackaging,
            'total_logistic' => $this->totalLogistic,
            'footprint_usage' => $this->footprintUsage,
            'footprint_end_of_life' => $this->footprintEndOfLife,
            'total' => $this->total,
            'score' => $this->score,
            'score_unit' => $this->scoreUnit
        ];
    }
}
