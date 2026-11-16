<?php

namespace EuropeanSourcing\Apiv3Client\Tests\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\Aggregation\Brand as AggregationBrand;
use EuropeanSourcing\Apiv3Client\Model\Brand;
use EuropeanSourcing\Apiv3Client\Model\Image;
use EuropeanSourcing\Apiv3Client\Normalizer\Aggregation\BrandNormalizer as AggregationBrandNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\BrandNormalizer;
use EuropeanSourcing\Apiv3Client\Service\NormalizerService;
use PHPUnit\Framework\TestCase;

class BrandNormalizerTest extends TestCase
{
    public function testProductBrand(): void
    {
        $brandNormalizer = (new NormalizerService())->getNormalizer(BrandNormalizer::class);
        $result = $brandNormalizer->denormalize([
            'project_id' => '195',
            'name' => 'Kariban',
            'logo' => [
                'original_filename' => '195_Kariban.png',
                'project_id' => '80',
                'id' => '80',
                'url' => 'https://uploads.europeansourcing.com/brand/logo/195_Kariban.png',
            ],
            'id' => '195',
            'suffix' => 'registered_trademark',
            'slug' => 'kariban',
        ]);

        $this->assertInstanceOf(Brand::class, $result);
        $this->assertSame('195', $result->getId());
        $this->assertSame('Kariban', $result->getName());
        $this->assertSame('kariban', $result->getSlug());
        $this->assertSame('registered_trademark', $result->getSuffix());

        $logo = $result->getLogo();
        $this->assertInstanceOf(Image::class, $logo);
        $this->assertSame('80', $logo->getId());
        $this->assertSame('https://uploads.europeansourcing.com/brand/logo/195_Kariban.png', $logo->getUrl());
        $this->assertSame('195_Kariban.png', $logo->getOriginalFilename());
    }

    public function testAggregationBrand(): void
    {
        $brandNormalizer = new AggregationBrandNormalizer();
        $result = $brandNormalizer->denormalize([
            'count' => 64,
            'name' => 'Nina Ricci',
            'id' => '276',
            'slug' => 'nina-ricci',
        ]);

        $this->assertInstanceOf(AggregationBrand::class, $result);
        $this->assertSame('276', $result->getId());
        $this->assertSame('Nina Ricci', $result->getName());
        $this->assertSame('nina-ricci', $result->getSlug());
        $this->assertSame(64, $result->getCount());
        $this->assertNull($result->getLogo());
    }

    public function testBrandsEndpoint(): void
    {
        $brandNormalizer = (new NormalizerService())->getNormalizer(BrandNormalizer::class);
        $result = $brandNormalizer->denormalize([
            'key' => ['id' => 1292, 'user' => null],
            'name' => 'Valenta',
            'suffix' => 'registered_trademark',
            'slug' => 'valenta',
            'count' => 7,
            'image_path' => 'https://uploads.europeansourcing.com/2019/10/08/'
                . 'e6501dc86c3eca827475e1ff0b05dc13dc7f5b82/valenta.jpg',
            'id' => 1292,
        ]);

        $this->assertInstanceOf(Brand::class, $result);
        $this->assertSame(1292, $result->getId());
        $this->assertSame('Valenta', $result->getName());
        $this->assertSame('valenta', $result->getSlug());
        $this->assertSame('registered_trademark', $result->getSuffix());
        $this->assertNull($result->getLogo());
    }
}
