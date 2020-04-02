<?php

namespace Medialeads\Apiv3Client\Tests;

use Medialeads\Apiv3Client\Model\Brand;
use Medialeads\Apiv3Client\Normalizer\BrandNormalizer;
use PHPUnit\Framework\TestCase;

class BrandNormalizerTest extends TestCase
{
    public function testProductBrand()
    {
        $brandNormalizer = new BrandNormalizer();
        $result = $brandNormalizer->denormalize(
            \json_decode('{
				"project_id": "195",
				"name": "Kariban",
				"logo": {
					"original_filename": "195_Kariban.png",
					"project_id": "80",
					"id": "80",
					"url": "https://uploads.europeansourcing.com/brand/logo/195_Kariban.png"
				},
				"id": "195",
				"suffix": "registered_trademark",
				"slug": "kariban"
			}', true)
        );

        $this->assertInstanceOf(Brand::class, $result);
        $this->assertSame(var_export($result, true), "Medialeads\Apiv3Client\Model\Brand::__set_state(array(
   'id' => '195',
   'name' => 'Kariban',
   'slug' => 'kariban',
   'suffix' => 'registered_trademark',
   'logo' => 
  Medialeads\Apiv3Client\Model\Image::__set_state(array(
     'id' => '80',
     'url' => 'https://uploads.europeansourcing.com/brand/logo/195_Kariban.png',
     'originalFilename' => '195_Kariban.png',
  )),
))");
    }

    public function testAggregationBrand()
    {
        $brandNormalizer = new \Medialeads\Apiv3Client\Normalizer\Aggregation\BrandNormalizer();
        $result = $brandNormalizer->denormalize(
            \json_decode('{"count":64,"name":"Nina Ricci","id":"276","slug":"nina-ricci"}', true)
        );

        $this->assertInstanceOf(\Medialeads\Apiv3Client\Model\Aggregation\Brand::class, $result);
        $this->assertSame(var_export($result, true), "Medialeads\Apiv3Client\Model\Aggregation\Brand::__set_state(array(
   'id' => '276',
   'name' => 'Nina Ricci',
   'slug' => 'nina-ricci',
   'count' => 64,
))");
    }

    public function testBrandsEndpoint()
    {
        $brandNormalizer = new BrandNormalizer();
        $result = $brandNormalizer->denormalize(
            \json_decode('{"key":{"id":1292,"user":null},"name":"Valenta","suffix":"registered_trademark","slug":"valenta","count":7,"image_path":"https://uploads.europeansourcing.com/2019/10/08/e6501dc86c3eca827475e1ff0b05dc13dc7f5b82/valenta.jpg","id":1292}', true)
        );

        $this->assertInstanceOf(Brand::class, $result);
        $this->assertSame(var_export($result, true), "Medialeads\Apiv3Client\Model\Brand::__set_state(array(
   'id' => 1292,
   'name' => 'Valenta',
   'slug' => 'valenta',
   'suffix' => 'registered_trademark',
   'logo' => NULL,
))");
    }
}
