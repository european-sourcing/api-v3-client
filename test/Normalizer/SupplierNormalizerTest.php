<?php

namespace Medialeads\Apiv3Client\Tests;

use Medialeads\Apiv3Client\Model\Supplier;
use Medialeads\Apiv3Client\Normalizer\SupplierNormalizer;
use PHPUnit\Framework\TestCase;

class SupplierNormalizerTest extends TestCase
{
    public function testProductSupplier()
    {
        $supplierNormalizer = new SupplierNormalizer();
        $result = $supplierNormalizer->denormalize(
            \json_decode('{
				"project_id": "614",
				"vat_identification_number": "NL801765183B01",
				"supplier_profiles": [
					{
						"country_code": "NL",
						"address_line2": "PO Box 3038",
						"address_line1": "Verrijn Stuartlaan 1d",
						"project_id": "419",
						"name": "XINDAO BV (France)",
						"locality": "Rijswijk",
						"association": null,
						"id": "419",
						"postal_code": "2288EK"
					}
				],
				"name": "XINDAO BV",
				"id": "614",
				"legal_name": "XINDAO BV",
				"slug": "xindao-bv"
			}', true)
        );

        $this->assertInstanceOf(Supplier::class, $result);
        $this->assertSame(var_export($result, true), "Medialeads\Apiv3Client\Model\Supplier::__set_state(array(
   'id' => '614',
   'name' => 'XINDAO BV',
   'slug' => 'xindao-bv',
   'legalName' => 'XINDAO BV',
   'vatIdentificationNumber' => NULL,
   'count' => NULL,
   'supplierProfiles' => 
  array (
    0 => 
    Medialeads\Apiv3Client\Model\SupplierProfile::__set_state(array(
       'id' => '419',
       'name' => 'XINDAO BV (France)',
       'countryCode' => 'NL',
       'locality' => 'Rijswijk',
       'association' => NULL,
       'postalCode' => '2288EK',
       'addressLine1' => 'PO Box 3038',
       'addressLine2' => NULL,
    )),
  ),
))");
    }

    public function testAggregationBrand()
    {
        $supplierNormalizer = new \Medialeads\Apiv3Client\Normalizer\Aggregation\SupplierNormalizer();
        $result = $supplierNormalizer->denormalize(
            \json_decode('{"count":287,"name":"BALADEO - CORIOLIS sarl","id":"340"}', true)
        );

        $this->assertInstanceOf(\Medialeads\Apiv3Client\Model\Aggregation\Supplier::class, $result);
        $this->assertSame(var_export($result, true), "Medialeads\Apiv3Client\Model\Aggregation\Supplier::__set_state(array(
   'id' => '340',
   'name' => 'BALADEO - CORIOLIS sarl',
   'count' => 287,
))");
    }

    public function testSuppliersEndpoint()
    {
        $supplierNormalizer = new SupplierNormalizer();
        $result = $supplierNormalizer->denormalize(
            \json_decode('{"id":344,"name":"BOOMERANG SAS (BEWEAR)","count":798,"slug":"boomerang-sas-bewear"}', true)
        );

        $this->assertInstanceOf(Supplier::class, $result);
        $this->assertSame(var_export($result, true), "Medialeads\Apiv3Client\Model\Supplier::__set_state(array(
   'id' => 344,
   'name' => 'BOOMERANG SAS (BEWEAR)',
   'slug' => 'boomerang-sas-bewear',
   'legalName' => NULL,
   'vatIdentificationNumber' => NULL,
   'count' => 798,
   'supplierProfiles' => NULL,
))");
    }
}
