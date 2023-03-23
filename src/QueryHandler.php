<?php

namespace Medialeads\Apiv3Client;

class QueryHandler
{
    const BRANDS_AGGREGATION = 'brands';
    const ATTRIBUTES = 'attributes';
    const CATEGORIES = 'categories';
    const SUPPLIERS = 'suppliers';
    const SUPPLIER_PROFILES = 'supplier_profiles';
    const MARKING = 'marking';
    const COUNTRY = 'country';
    const COUNTRY_OF_ORIGIN = 'country_of_origin';

    /**
     * @var string
     */
    private $language;

    /**
     * @var int
     */
    private $page;

    /**
     * @var int
     */
    private $offset;

    /**
     * @var int
     */
    private $perpage;

    /**
     * @var string
     */
    private $sortField;

    /**
     * @var string
     */
    private $sortDirection;

    /**
     * @var bool
     */
    private $oneVariant;

    /**
     * @var bool
     */
    private $enableAggregations;

    /**
     * @var array<string>
     */
    private $includeAggregations = [];

    /**
     * @var array
     */
    private $searchHandlers;

    public function __construct($language)
    {
        $this->searchHandlers = [];
        $this->page = 1;
        $this->offset = null;
        $this->perpage = 10;
        $this->sortField = 'relevance';
        $this->sortDirection = 'desc';
        $this->oneVariant = false;
        $this->enableAggregations = false;
        $this->language = $language;
    }

    /**
     * @return array
     */
    public function export()
    {
        $searchExports = [];
        foreach ($this->searchHandlers as $searchHandler) {
            $searchExports[] = $searchHandler->export();
        }

        $export = [
            'search_handlers' => $searchExports,
            'lang' => $this->language,
            'limit' => $this->perpage,
            'sort_field' => $this->sortField,
            'sort_direction' => $this->sortDirection,
            'one_variant' => $this->oneVariant,
            'enable_aggregations' => $this->enableAggregations
        ];

        if (true === $this->enableAggregations && 0 < count($this->includeAggregations)) {
            $export['include_aggregations'] = $this->includeAggregations;
        }

        if (null !== $this->offset) {
            $export['offset'] = $this->offset;
        } else {
            $export['page'] = $this->page;
        }

        return $export;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     *
     * @return QueryHandler
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     *
     * @return QueryHandler
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * @return int
     */
    public function getPerpage()
    {
        return $this->perpage;
    }

    /**
     * @param int $perpage
     *
     * @return QueryHandler
     */
    public function setPerpage($perpage)
    {
        $this->perpage = $perpage;

        return $this;
    }

    /**
     * @return string
     */
    public function getSortField()
    {
        return $this->sortField;
    }

    /**
     * @param string $sortField
     *
     * @return QueryHandler
     */
    public function setSortField($sortField)
    {
        $this->sortField = $sortField;

        return $this;
    }

    /**
     * @return string
     */
    public function getSortDirection()
    {
        return $this->sortDirection;
    }

    /**
     * @param string $sortDirection
     *
     * @return QueryHandler
     */
    public function setSortDirection($sortDirection)
    {
        $this->sortDirection = $sortDirection;

        return $this;
    }

    /**
     * @return array
     */
    public function getSearchHandlers()
    {
        return $this->searchHandlers;
    }

    /**
     * @param array $searchHandlers
     *
     * @return QueryHandler
     */
    public function setSearchHandlers($searchHandlers)
    {
        $this->searchHandlers = $searchHandlers;

        return $this;
    }

    /**
     * @param SearchHandler $searchHandler
     *
     * @return QueryHandler
     */
    public function addSearchHandler(SearchHandler $searchHandler)
    {
        $this->searchHandlers[] = $searchHandler;

        return $this;
    }

    /**
     * @return bool
     */
    public function isOneVariant()
    {
        return $this->oneVariant;
    }

    /**
     * @param bool $oneVariant
     *
     * @return QueryHandler
     */
    public function setOneVariant($oneVariant)
    {
        $this->oneVariant = $oneVariant;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEnableAggregations()
    {
        return $this->enableAggregations;
    }

    /**
     * @param bool $enableAggregations
     *
     * @return QueryHandler
     */
    public function setEnableAggregations($enableAggregations)
    {
        $this->enableAggregations = $enableAggregations;

        return $this;
    }

    /**
     * @return array<string>
     */
    public function getIncludeAggregations(): array
    {
        return $this->includeAggregations;
    }

    /**
     * @param array<string> $includeAggregations
     * @return QueryHandler
     */
    public function setIncludeAggregations(array $includeAggregations): QueryHandler
    {
        $this->includeAggregations = $includeAggregations;

        if (0 < count($includeAggregations)) {
            $this->setEnableAggregations(true);
        }

        return $this;
    }
}
