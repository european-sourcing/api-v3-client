<?php

namespace Medialeads\Apiv3Client\Model\Marking;

use Medialeads\Apiv3Client\Common\Collection;

class SupplierOption
{
    /** @var string */
    private $code;

    /** @var int */
    private $count;

    /** @var SupplierOptionTranslation */
    private $translation;

    /** @var Collection */
    private $staticVariablePriceHolders;

    /** @var Collection */
    private $dynamicVariablePriceHolders;

    public function __construct()
    {
        $this->staticVariablePriceHolders = new Collection();
        $this->dynamicVariablePriceHolders = new Collection();
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }

    public function getTranslation(): SupplierOptionTranslation
    {
        return $this->translation;
    }

    public function setTranslation(SupplierOptionTranslation $translation): self
    {
        $this->translation = $translation;

        return $this;
    }

    public function getStaticVariablePriceHolders(): Collection
    {
        return $this->staticVariablePriceHolders;
    }

    public function setStaticVariablePriceHolders(Collection $staticVariablePriceHolders): self
    {
        $this->staticVariablePriceHolders = $staticVariablePriceHolders;

        return $this;
    }

    public function addStaticVariablePriceHolder(SupplierOptionStaticVariablePriceHolder $staticVariablePriceHolder): self
    {
        $this->staticVariablePriceHolders->add($staticVariablePriceHolder->getId(), $staticVariablePriceHolder);

        return $this;
    }

    public function getDynamicVariablePriceHolders(): Collection
    {
        return $this->dynamicVariablePriceHolders;
    }

    public function setDynamicVariablePriceHolders(Collection $dynamicVariablePriceHolders): self
    {
        $this->dynamicVariablePriceHolders = $dynamicVariablePriceHolders;

        return $this;
    }

    public function addDynamicVariablePriceHolder(SupplierOptionDynamicVariablePriceHolder $dynamicVariablePriceHolder): self
    {
        $this->dynamicVariablePriceHolders->add($dynamicVariablePriceHolder->getId(), $dynamicVariablePriceHolder);

        return $this;
    }
}
