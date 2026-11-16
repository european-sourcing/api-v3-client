<?php

namespace EuropeanSourcing\Apiv3Client\Tests\Client;

use EuropeanSourcing\Apiv3Client\Client;
use EuropeanSourcing\Apiv3Client\Common\Collection;
use EuropeanSourcing\Apiv3Client\QueryHandler;
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

    public function testSearchLightSendsJsonBodyWithContentType(): void
    {
        $client = $this->createClient(['products' => [], 'pagination' => ['total_items' => 0]]);

        $client->searchLight(new QueryHandler('fr'));

        $request = $this->history[0]['request'];
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('https://api.test/search/light', (string) $request->getUri());
        $this->assertSame('application/json', $request->getHeaderLine('Content-Type'));
        $this->assertSame('token', $request->getHeaderLine('X-AUTH-TOKEN'));
        $this->assertSame((new QueryHandler('fr'))->export(), json_decode((string) $request->getBody(), true));
    }

    public function testSearchSendsJsonBodyWithContentType(): void
    {
        $client = $this->createClient(['products' => [], 'pagination' => ['total_items' => 0]]);

        $client->search(new QueryHandler('fr'));

        $request = $this->history[0]['request'];
        $this->assertSame('https://api.test/search', (string) $request->getUri());
        $this->assertSame('application/json', $request->getHeaderLine('Content-Type'));
    }

    public function testContentTypeIsNotDuplicatedWhenInjectedGuzzleClientAlreadySetsIt(): void
    {
        $client = $this->createClient(
            ['products' => [], 'pagination' => ['total_items' => 0]],
            ['headers' => ['Content-Type' => 'application/json']]
        );

        $client->searchLight(new QueryHandler('fr'));

        $this->assertSame(
            ['application/json'],
            $this->history[0]['request']->getHeader('Content-Type')
        );
    }

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
