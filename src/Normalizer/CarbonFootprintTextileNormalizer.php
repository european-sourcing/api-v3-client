<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\CarbonFootprintTextile;

class CarbonFootprintTextileNormalizer
{
    public function denormalize(array $data): ?CarbonFootprintTextile
    {
        $totalCarbon = $data['total_carbon_production'] ?? null;
        $benchmarkCarbon = $data['benchmark_carbon_production'] ?? null;
        $savingCarbon = $data['saving_carbon_production'] ?? null;
        $totalWater = $data['total_water_production'] ?? null;
        $benchmarkWater = $data['benchmark_water_production'] ?? null;
        $savingWater = $data['saving_water_production'] ?? null;
        $totalGround = $data['total_ground_production'] ?? null;
        $benchmarkGround = $data['benchmark_ground_production'] ?? null;
        $savingGround = $data['saving_ground_production'] ?? null;

        if (
            null === $totalCarbon
            && null === $benchmarkCarbon
            && null === $savingCarbon
            && null === $totalWater
            && null === $benchmarkWater
            && null === $savingWater
            && null === $totalGround
            && null === $benchmarkGround
            && null === $savingGround
        ) {
            return null;
        }

        $carbonFootprintTextile = new CarbonFootprintTextile();
        $carbonFootprintTextile->setTotalCarbonProduction($totalCarbon);
        $carbonFootprintTextile->setBenchmarkCarbonProduction($benchmarkCarbon);
        $carbonFootprintTextile->setSavingCarbonProduction($savingCarbon);
        $carbonFootprintTextile->setTotalWaterProduction($totalWater);
        $carbonFootprintTextile->setBenchmarkWaterProduction($benchmarkWater);
        $carbonFootprintTextile->setSavingWaterProduction($savingWater);
        $carbonFootprintTextile->setTotalGroundProduction($totalGround);
        $carbonFootprintTextile->setBenchmarkGroundProduction($benchmarkGround);
        $carbonFootprintTextile->setSavingGroundProduction($savingGround);

        return $carbonFootprintTextile;
    }
}
