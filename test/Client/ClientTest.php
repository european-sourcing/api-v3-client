<?php

namespace EuropeanSourcing\Apiv3Client\Tests\Client;

use EuropeanSourcing\Apiv3Client\Client;
use EuropeanSourcing\Apiv3Client\Common\Collection;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

class ClientTest extends TestCase
{
    /** @var array<int, array{request: RequestInterface}> */
    private array $history = [];

    public function testBrands(): void
    {
        $client = $this->createClient([
            ['id' => 1292, 'name' => 'Valenta', 'slug' => 'valenta'],
        ]);

        $brands = $client->brands();

        $this->assertInstanceOf(Collection::class, $brands);
        $this->assertCount(1, $brands);
        $this->assertSame('Valenta', $brands->get('1292')->getName());
    }

    /**
     * @param array<mixed> $responseBody
     * @param array<string, mixed> $guzzleConfig
     */
    private function createClient(array $responseBody, array $guzzleConfig = []): Client
    {
        $this->history = [];
        $stack = HandlerStack::create(new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], json_encode($responseBody)),
        ]));
        $stack->push(Middleware::history($this->history));

        return new Client(
            new GuzzleClient(['handler' => $stack] + $guzzleConfig),
            'https://api.test',
            'token'
        );
    }
}
