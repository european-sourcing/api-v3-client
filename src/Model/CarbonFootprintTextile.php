<?php

namespace EuropeanSourcing\Apiv3Client\Model;

use JsonSerializable;

class CarbonFootprintTextile implements JsonSerializable
{
    private ?float $totalCarbonProduction = null;

    private ?float $benchmarkCarbonProduction = null;

    private ?float $savingCarbonProduction = null;

    private ?float $totalWaterProduction = null;

    private ?float $benchmarkWaterProduction = null;

    private ?float $savingWaterProduction = null;

    private ?float $totalGroundProduction = null;

    private ?float $benchmarkGroundProduction = null;

    private ?float $savingGroundProduction = null;

    public function getTotalCarbonProduction(): ?float
    {
        return $this->totalCarbonProduction;
    }

    public function setTotalCarbonProduction(?float $totalCarbonProduction): CarbonFootprintTextile
    {
        $this->totalCarbonProduction = $totalCarbonProduction;

        return $this;
    }

    public function getBenchmarkCarbonProduction(): ?float
    {
        return $this->benchmarkCarbonProduction;
    }

    public function setBenchmarkCarbonProduction(?float $benchmarkCarbonProduction): CarbonFootprintTextile
    {
        $this->benchmarkCarbonProduction = $benchmarkCarbonProduction;

        return $this;
    }

    public function getSavingCarbonProduction(): ?float
    {
        return $this->savingCarbonProduction;
    }

    public function setSavingCarbonProduction(?float $savingCarbonProduction): CarbonFootprintTextile
    {
        $this->savingCarbonProduction = $savingCarbonProduction;

        return $this;
    }

    public function getTotalWaterProduction(): ?float
    {
        return $this->totalWaterProduction;
    }

    public function setTotalWaterProduction(?float $totalWaterProduction): CarbonFootprintTextile
    {
        $this->totalWaterProduction = $totalWaterProduction;

        return $this;
    }

    public function getBenchmarkWaterProduction(): ?float
    {
        return $this->benchmarkWaterProduction;
    }

    public function setBenchmarkWaterProduction(?float $benchmarkWaterProduction): CarbonFootprintTextile
    {
        $this->benchmarkWaterProduction = $benchmarkWaterProduction;

        return $this;
    }

    public function getSavingWaterProduction(): ?float
    {
        return $this->savingWaterProduction;
    }

    public function setSavingWaterProduction(?float $savingWaterProduction): CarbonFootprintTextile
    {
        $this->savingWaterProduction = $savingWaterProduction;

        return $this;
    }

    public function getTotalGroundProduction(): ?float
    {
        return $this->totalGroundProduction;
    }

    public function setTotalGroundProduction(?float $totalGroundProduction): CarbonFootprintTextile
    {
        $this->totalGroundProduction = $totalGroundProduction;

        return $this;
    }

    public function getBenchmarkGroundProduction(): ?float
    {
        return $this->benchmarkGroundProduction;
    }

    public function setBenchmarkGroundProduction(?float $benchmarkGroundProduction): CarbonFootprintTextile
    {
        $this->benchmarkGroundProduction = $benchmarkGroundProduction;

        return $this;
    }

    public function getSavingGroundProduction(): ?float
    {
        return $this->savingGroundProduction;
    }

    public function setSavingGroundProduction(?float $savingGroundProduction): CarbonFootprintTextile
    {
        $this->savingGroundProduction = $savingGroundProduction;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'total_carbon_production' => $this->totalCarbonProduction,
            'benchmark_carbon_production' => $this->benchmarkCarbonProduction,
            'saving_carbon_production' => $this->savingCarbonProduction,
            'total_water_production' => $this->totalWaterProduction,
            'benchmark_water_production' => $this->benchmarkWaterProduction,
            'saving_water_production' => $this->savingWaterProduction,
            'total_ground_production' => $this->totalGroundProduction,
            'benchmark_ground_production' => $this->benchmarkGroundProduction,
            'saving_ground_production' => $this->savingGroundProduction
        ];
    }
}
