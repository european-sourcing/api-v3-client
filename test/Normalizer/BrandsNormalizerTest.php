<?php

namespace EuropeanSourcing\Apiv3Client\Tests\Normalizer;

use EuropeanSourcing\Apiv3Client\Common\Collection;
use EuropeanSourcing\Apiv3Client\Model\Brand;
use EuropeanSourcing\Apiv3Client\Normalizer\BrandsNormalizer;
use EuropeanSourcing\Apiv3Client\Service\NormalizerService;
use PHPUnit\Framework\TestCase;

class BrandsNormalizerTest extends TestCase
{
    public function testBrandsEndpoint(): void
    {
        $brandsNormalizer = (new NormalizerService())->getNormalizer(BrandsNormalizer::class);
        $result = $brandsNormalizer->denormalize([
            ['id' => 1292, 'name' => 'Valenta', 'slug' => 'valenta', 'suffix' => 'registered_trademark'],
            ['id' => 276, 'name' => 'Nina Ricci', 'slug' => 'nina-ricci'],
        ]);

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(2, $result);

        $brands = iterator_to_array($result);
        $this->assertContainsOnlyInstancesOf(Brand::class, $brands);
        $this->assertSame('Valenta', $brands[1292]->getName());
        $this->assertSame('Nina Ricci', $brands[276]->getName());
        $this->assertNull($brands[276]->getSuffix());
    }
}
