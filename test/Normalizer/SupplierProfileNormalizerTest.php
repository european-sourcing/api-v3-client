<?php

namespace EuropeanSourcing\Apiv3Client\Tests\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\SupplierProfile;
use EuropeanSourcing\Apiv3Client\Normalizer\SupplierProfileNormalizer;
use PHPUnit\Framework\TestCase;

class SupplierProfileNormalizerTest extends TestCase
{
    public function testSupplierProfile(): void
    {
        $supplierProfileNormalizer = new SupplierProfileNormalizer();
        $result = $supplierProfileNormalizer->denormalize([
            'id' => 386,
            'name' => 'SENATOR France',
            'count' => 199,
            'slug' => 'senator-france',
            'country_code' => 'FR',
            'address_line1' => 'ZI DE MARTICOT',
            'postal_code' => '33612',
            'locality' => 'CESTAS',
        ]);

        $this->assertInstanceOf(SupplierProfile::class, $result);
        $this->assertSame(386, $result->getId());
        $this->assertSame('SENATOR France', $result->getName());
        $this->assertSame('FR', $result->getCountryCode());
        $this->assertSame('CESTAS', $result->getLocality());
        $this->assertNull($result->getAssociation());
        $this->assertSame('33612', $result->getPostalCode());
        $this->assertSame('ZI DE MARTICOT', $result->getAddressLine1());
        $this->assertNull($result->getAddressLine2());
    }
}
