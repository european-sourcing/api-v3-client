# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Commands

```bash
# Install dependencies
composer install

# Run all tests
vendor/bin/phpunit

# Run a single test method
vendor/bin/phpunit --filter testMethodName

# Run a single test class
vendor/bin/phpunit test/Normalizer/BrandNormalizerTest.php
```

## Architecture

This is a PHP library (Composer package) providing a typed client for the EuropeanSourcing Product API v3. It uses GuzzleHttp for HTTP and has no framework dependency.

### Request flow

1. **`Client`** (`src/Client.php`) — main entry point. Wraps Guzzle, handles auth via `X-AUTH-TOKEN` header, and dispatches to normalizers. Methods map 1-to-1 to API endpoints: `search()`, `searchLight()`, `productDetailsByVariantId()`, `brands()`, `suppliers()`, `supplierProfiles()`, `marking()`, `markingLight()`, `calculateMarking()`.

2. **`QueryHandler`** (`src/QueryHandler.php`) — builds the POST body for search requests: language, pagination (`page` or `offset`/`limit`), sort, `one_variant`, aggregations. Call `export()` to get the serializable array.

3. **`QueryBuilder`** (`src/QueryBuilder.php`) — factory for `Request\*` filter objects (brand, category, supplier, price, query text, etc.). Each method returns a typed object implementing `RequestElementInterface`.

4. **`SearchHandler`** (`src/SearchHandler.php`) — a filter group. Add `RequestElementInterface` elements; they merge into a flat array via `export()`. Multiple `SearchHandler` instances can be added to a `QueryHandler` to form `search_handlers`.

### Models and Normalizers

Models live in `src/Model/` and normalizers in `src/Normalizer/`, with matching sub-namespaces:

| Sub-namespace | Purpose |
|---|---|
| `Model\*` / `Normalizer\*` | Top-level models used across endpoints (Brand, Category, Variant, Supplier…) |
| `Model\Aggregation\*` | Facet/aggregation models returned alongside search results |
| `Model\ProductDetails\*` | Rich product/variant models returned by `productDetailsByVariantId()` |
| `Model\SearchLight\*` | Lightweight product/variant models returned by `searchLight()` |
| `Model\Marking\*` | Full marking detail models |
| `Model\MarkingLight\*` | Lightweight marking models |

Every normalizer implements `NormalizerInterface::denormalize(array $data): object|array`. Normalizers that need to instantiate sub-normalizers extend `AbstractNormalizer` and receive a `NormalizerService` in their constructor.

**`NormalizerService`** (`src/Service/NormalizerService.php`) acts as a lazy-loading registry: `getNormalizer(ClassName::class)` returns a cached instance, which avoids duplicate instantiation in recursive denormalization.

`AbstractCachableNormalizer` adds result caching on top of `AbstractNormalizer` for normalizers that repeatedly process the same data (e.g., shared categories or attributes).

### Response objects

`SearchResponse` and `SearchLightResponse` both extend `AbstractSearchResponse` and hold:
- a collection of products (full or light variant)
- total product count for pagination
- a list of `Aggregation` objects (facets), each containing typed aggregation items

### Namespace

`EuropeanSourcing\Apiv3Client\` — autoloaded via PSR-4 from `src/`. Test namespace `EuropeanSourcing\Apiv3Client\Tests\` maps to `test/`.
