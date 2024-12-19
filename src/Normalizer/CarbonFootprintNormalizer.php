<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\CarbonFootprint;

class CarbonFootprintNormalizer
{
    public function denormalize(array $data): ?CarbonFootprint
    {
        $usage = $data['footprint_usage'] ?? null;
        $endOfLife = $data['footprint_end_of_life'] ?? null;
        $totalCarbonProduction = $data['total_carbon_production'] ?? null;
        $totalLogistic = $data['total_logistic'] ?? null;
        $totalPackaging = $data['total_packaging'] ?? null;
        $total = $data['total'] ?? null;
        $score = $data['score'] ?? null;
        $scoreUnit = $data['score_unit'] ?? null;

        if (
            null === $usage
            && null === $endOfLife
            && null === $totalCarbonProduction
            && null === $totalLogistic
            && null === $totalPackaging
            && null === $total
            && null === $score
        ) {
            return null;
        }

        $carbonFootprint = new CarbonFootprint();
        $carbonFootprint->setFootprintUsage($usage);
        $carbonFootprint->setFootprintEndOfLife($endOfLife);
        $carbonFootprint->setTotalCarbonProduction($totalCarbonProduction);
        $carbonFootprint->setTotalLogistic($totalLogistic);
        $carbonFootprint->setTotalPackaging($totalPackaging);
        $carbonFootprint->setTotal($total);
        $carbonFootprint->setScore($score);
        $carbonFootprint->setScoreUnit($scoreUnit);

        return $carbonFootprint;
    }
}
