<?php

namespace Medialeads\Apiv3Client\Tests;

use Medialeads\Apiv3Client\Model\Supplier;
use Medialeads\Apiv3Client\Model\SupplierProfile;
use Medialeads\Apiv3Client\Normalizer\SupplierProfileNormalizer;
use PHPUnit\Framework\TestCase;

class SupplierProfileNormalizerTest extends TestCase
{
    public function testSupplierProfile()
    {
        $supplierProfileNormalizer = new SupplierProfileNormalizer();
        $result = $supplierProfileNormalizer->denormalize(
            \json_decode('{"id":386,"name":"SENATOR France","count":199,"slug":"senator-france","country_code":"FR","address_line1":"ZI DE MARTICOT","postal_code":"33612","locality":"CESTAS"}', true)
        );

        $this->assertInstanceOf(SupplierProfile::class, $result);
        $this->assertSame(var_export($result, true), "Medialeads\Apiv3Client\Model\SupplierProfile::__set_state(array(
   'id' => 386,
   'name' => 'SENATOR France',
   'countryCode' => 'FR',
   'locality' => 'CESTAS',
   'association' => NULL,
   'postalCode' => '33612',
   'addressLine1' => 'ZI DE MARTICOT',
   'addressLine2' => NULL,
))");
    }
}
