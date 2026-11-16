<?php

namespace EuropeanSourcing\Apiv3Client\Tests\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\Aggregation\Supplier as AggregationSupplier;
use EuropeanSourcing\Apiv3Client\Model\Supplier;
use EuropeanSourcing\Apiv3Client\Model\SupplierProfile;
use EuropeanSourcing\Apiv3Client\Normalizer\Aggregation\SupplierNormalizer as AggregationSupplierNormalizer;
use EuropeanSourcing\Apiv3Client\Normalizer\SupplierNormalizer;
use PHPUnit\Framework\TestCase;

class SupplierNormalizerTest extends TestCase
{
    public function testProductSupplier(): void
    {
        $supplierNormalizer = new SupplierNormalizer();
        $result = $supplierNormalizer->denormalize([
            'project_id' => '614',
            'vat_identification_number' => 'NL801765183B01',
            'supplier_profiles' => [
                [
                    'country_code' => 'NL',
                    'address_line2' => 'PO Box 3038',
                    'address_line1' => 'Verrijn Stuartlaan 1d',
                    'project_id' => '419',
                    'name' => 'XINDAO BV (France)',
                    'locality' => 'Rijswijk',
                    'association' => null,
                    'id' => '419',
                    'postal_code' => '2288EK',
                ],
            ],
            'name' => 'XINDAO BV',
            'id' => '614',
            'legal_name' => 'XINDAO BV',
            'slug' => 'xindao-bv',
        ]);

        $this->assertInstanceOf(Supplier::class, $result);
        $this->assertSame('614', $result->getId());
        $this->assertSame('XINDAO BV', $result->getName());
        $this->assertSame('xindao-bv', $result->getSlug());
        $this->assertSame('XINDAO BV', $result->getLegalName());
        $this->assertNull($result->getCount());
        $this->assertNull($result->getSupplierContacts());

        $profiles = $result->getSupplierProfiles();
        $this->assertCount(1, $profiles);
        $this->assertInstanceOf(SupplierProfile::class, $profiles[0]);
        $this->assertSame(419, $profiles[0]->getId());
        $this->assertSame('XINDAO BV (France)', $profiles[0]->getName());
        $this->assertSame('NL', $profiles[0]->getCountryCode());
        $this->assertSame('Rijswijk', $profiles[0]->getLocality());
        $this->assertNull($profiles[0]->getAssociation());
        $this->assertSame('2288EK', $profiles[0]->getPostalCode());
        $this->assertSame('Verrijn Stuartlaan 1d', $profiles[0]->getAddressLine1());
        $this->assertSame('PO Box 3038', $profiles[0]->getAddressLine2());
    }

    public function testAggregationSupplier(): void
    {
        $supplierNormalizer = new AggregationSupplierNormalizer();
        $result = $supplierNormalizer->denormalize([
            'count' => 287,
            'name' => 'BALADEO - CORIOLIS sarl',
            'id' => '340',
        ]);

        $this->assertInstanceOf(AggregationSupplier::class, $result);
        $this->assertSame('340', $result->getId());
        $this->assertSame('BALADEO - CORIOLIS sarl', $result->getName());
        $this->assertSame(287, $result->getCount());
    }

    public function testSuppliersEndpoint(): void
    {
        $supplierNormalizer = new SupplierNormalizer();
        $result = $supplierNormalizer->denormalize([
            'id' => 344,
            'name' => 'BOOMERANG SAS (BEWEAR)',
            'count' => 798,
            'slug' => 'boomerang-sas-bewear',
        ]);

        $this->assertInstanceOf(Supplier::class, $result);
        $this->assertSame(344, $result->getId());
        $this->assertSame('BOOMERANG SAS (BEWEAR)', $result->getName());
        $this->assertSame('boomerang-sas-bewear', $result->getSlug());
        $this->assertNull($result->getLegalName());
        $this->assertSame(798, $result->getCount());
        $this->assertNull($result->getSupplierProfiles());
        $this->assertNull($result->getSupplierContacts());
    }
}
