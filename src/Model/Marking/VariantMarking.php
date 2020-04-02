<?php

namespace Medialeads\Apiv3Client\Model\Marking;

use Medialeads\Apiv3Client\Common\Collection;

class VariantMarking
{
    /** @var int */
    private $id;

    /** @var int */
    private $key;

    /** @var bool */
    private $includedInVariantPrices;

    /** @var string */
    private $type;

    /** @var string */
    private $comment;

    /** @var float */
    private $width;

    /** @var float */
    private $minimumWidth;

    /** @var float */
    private $maximumWidth;

    /** @var bool */
    private $freeEntryWidth;

    /** @var float */
    private $length;

    /** @var float */
    private $minimumLength;

    /** @var float */
    private $maximumLength;

    /** @var bool */
    private $freeEntryLength;

    /** @var int */
    private $diameter;

    /** @var float */
    private $minimumDiameter;

    /** @var float */
    private $maximumDiameter;

    /** @var bool */
    private $freeEntryDiameter;

    /** @var float */
    private $squaredSize;

    /** @var float */
    private $minimumSquaredSize;

    /** @var float */
    private $maximumSquaredSize;

    /** @var bool */
    private $freeEntrySquaredSize;

    /** @var int */
    private $minimumQuantity;

    /** @var int */
    private $maximumQuantity;

    /** @var int */
    private $numberOfLogos;

    /** @var int */
    private $minimumNumberOfLogos;

    /** @var int */
    private $maximumNumberOfLogos;

    /** @var bool */
    private $freeEntryNumberOfLogos;

    /** @var bool */
    private $fullColor;

    /** @var int */
    private $numberOfColors;

    /** @var int */
    private $minimumNumberOfColors;

    /** @var int */
    private $maximumNumberOfColors;

    /** @var bool */
    private $freeEntryNumberOfColors;

    /** @var int */
    private $numberOfPositions;

    /** @var int */
    private $minimumNumberOfPositions;

    /** @var int */
    private $maximumNumberOfPositions;

    /** @var bool */
    private $freeEntryNumberOfPositions;

    /** @var Marking */
    private $marking;

    /** @var MarkingPosition */
    private $markingPosition;

    /** @var SupplierMarking */
    private $supplierMarking;

    /** @var Collection */
    private $supplierOptions;

    /** @var Collection */
    private $supplierProfiles;

    /** @var Collection */
    private $staticFixedPrices;

    /** @var Collection */
    private $dynamicFixedPrices;

    /** @var Collection */
    private $staticVariablePriceHolders;

    /** @var Collection */
    private $dynamicVariablePriceHolders;

    public function __construct()
    {
        $this->supplierOptions = new Collection();
        $this->supplierProfiles = new Collection();
        $this->staticFixedPrices = new Collection();
        $this->dynamicFixedPrices = new Collection();
        $this->staticVariablePriceHolders = new Collection();
        $this->dynamicVariablePriceHolders = new Collection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getKey(): int
    {
        return $this->key;
    }

    public function setKey(int $key): self
    {
        $this->key = $key;

        return $this;
    }

    public function isIncludedInVariantPrices(): bool
    {
        return $this->includedInVariantPrices;
    }

    public function setIncludedInVariantPrices(bool $includedInVariantPrices): self
    {
        $this->includedInVariantPrices = $includedInVariantPrices;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getWidth(): ?float
    {
        return $this->width;
    }

    public function setWidth(?float $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getMinimumWidth(): ?float
    {
        return $this->minimumWidth;
    }

    public function setMinimumWidth(?float $minimumWidth): self
    {
        $this->minimumWidth = $minimumWidth;

        return $this;
    }

    public function getMaximumWidth(): ?float
    {
        return $this->maximumWidth;
    }

    public function setMaximumWidth(?float $maximumWidth): self
    {
        $this->maximumWidth = $maximumWidth;

        return $this;
    }

    public function isFreeEntryWidth(): bool
    {
        return $this->freeEntryWidth;
    }

    public function setFreeEntryWidth(bool $freeEntryWidth): self
    {
        $this->freeEntryWidth = $freeEntryWidth;

        return $this;
    }

    public function getLength(): ?float
    {
        return $this->length;
    }

    public function setLength(?float $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getMinimumLength(): ?float
    {
        return $this->minimumLength;
    }

    public function setMinimumLength(?float $minimumLength): self
    {
        $this->minimumLength = $minimumLength;

        return $this;
    }

    public function getMaximumLength(): ?float
    {
        return $this->maximumLength;
    }

    public function setMaximumLength(?float $maximumLength): self
    {
        $this->maximumLength = $maximumLength;

        return $this;
    }

    public function isFreeEntryLength(): bool
    {
        return $this->freeEntryLength;
    }

    public function setFreeEntryLength(bool $freeEntryLength): self
    {
        $this->freeEntryLength = $freeEntryLength;

        return $this;
    }

    public function getDiameter(): ?int
    {
        return $this->diameter;
    }

    public function setDiameter(?int $diameter): self
    {
        $this->diameter = $diameter;

        return $this;
    }

    public function getMinimumDiameter(): ?float
    {
        return $this->minimumDiameter;
    }

    public function setMinimumDiameter(?float $minimumDiameter): self
    {
        $this->minimumDiameter = $minimumDiameter;

        return $this;
    }

    public function getMaximumDiameter(): ?float
    {
        return $this->maximumDiameter;
    }

    public function setMaximumDiameter(?float $maximumDiameter): self
    {
        $this->maximumDiameter = $maximumDiameter;

        return $this;
    }

    public function isFreeEntryDiameter(): bool
    {
        return $this->freeEntryDiameter;
    }

    public function setFreeEntryDiameter(bool $freeEntryDiameter): self
    {
        $this->freeEntryDiameter = $freeEntryDiameter;

        return $this;
    }

    public function isFullColor(): bool
    {
        return $this->fullColor;
    }

    public function setFullColor(bool $fullColor): self
    {
        $this->fullColor = $fullColor;

        return $this;
    }

    public function getSquaredSize(): ?float
    {
        return $this->squaredSize;
    }

    public function setSquaredSize(?float $squaredSize): self
    {
        $this->squaredSize = $squaredSize;

        return $this;
    }

    public function getMinimumSquaredSize(): ?float
    {
        return $this->minimumSquaredSize;
    }

    public function setMinimumSquaredSize(?float $minimumSquaredSize): self
    {
        $this->minimumSquaredSize = $minimumSquaredSize;

        return $this;
    }

    public function getMaximumSquaredSize(): ?float
    {
        return $this->maximumSquaredSize;
    }

    public function setMaximumSquaredSize(?float $maximumSquaredSize): self
    {
        $this->maximumSquaredSize = $maximumSquaredSize;

        return $this;
    }

    public function getMinimumQuantity(): ?int
    {
        return $this->minimumQuantity;
    }

    public function setMinimumQuantity(?int $minimumQuantity): self
    {
        $this->minimumQuantity = $minimumQuantity;

        return $this;
    }

    public function getMaximumQuantity(): ?int
    {
        return $this->maximumQuantity;
    }

    public function setMaximumQuantity(?int $maximumQuantity): self
    {
        $this->maximumQuantity = $maximumQuantity;

        return $this;
    }

    public function getNumberOfLogos(): ?int
    {
        return $this->numberOfLogos;
    }

    public function setNumberOfLogos(?int $numberOfLogos): self
    {
        $this->numberOfLogos = $numberOfLogos;

        return $this;
    }

    public function getMinimumNumberOfLogos(): ?int
    {
        return $this->minimumNumberOfLogos;
    }

    public function setMinimumNumberOfLogos(?int $minimumNumberOfLogos): self
    {
        $this->minimumNumberOfLogos = $minimumNumberOfLogos;

        return $this;
    }

    public function getMaximumNumberOfLogos(): ?int
    {
        return $this->maximumNumberOfLogos;
    }

    public function setMaximumNumberOfLogos(?int $maximumNumberOfLogos): self
    {
        $this->maximumNumberOfLogos = $maximumNumberOfLogos;

        return $this;
    }

    public function getNumberOfColors(): ?int
    {
        return $this->numberOfColors;
    }

    public function setNumberOfColors(?int $numberOfColors): self
    {
        $this->numberOfColors = $numberOfColors;

        return $this;
    }

    public function getMinimumNumberOfColors(): ?int
    {
        return $this->minimumNumberOfColors;
    }

    public function setMinimumNumberOfColors(?int $minimumNumberOfColors): self
    {
        $this->minimumNumberOfColors = $minimumNumberOfColors;

        return $this;
    }

    public function getMaximumNumberOfColors(): ?int
    {
        return $this->maximumNumberOfColors;
    }

    public function setMaximumNumberOfColors(?int $maximumNumberOfColors): self
    {
        $this->maximumNumberOfColors = $maximumNumberOfColors;

        return $this;
    }

    public function getNumberOfPositions(): ?int
    {
        return $this->numberOfPositions;
    }

    public function setNumberOfPositions(?int $numberOfPositions): self
    {
        $this->numberOfPositions = $numberOfPositions;

        return $this;
    }

    public function getMinimumNumberOfPositions(): ?int
    {
        return $this->minimumNumberOfPositions;
    }

    public function setMinimumNumberOfPositions(?int $minimumNumberOfPositions): self
    {
        $this->minimumNumberOfPositions = $minimumNumberOfPositions;

        return $this;
    }

    public function getMaximumNumberOfPositions(): ?int
    {
        return $this->maximumNumberOfPositions;
    }

    public function setMaximumNumberOfPositions(?int $maximumNumberOfPositions): self
    {
        $this->maximumNumberOfPositions = $maximumNumberOfPositions;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getMarking(): Marking
    {
        return $this->marking;
    }

    public function setMarking(Marking $marking): self
    {
        $this->marking = $marking;

        return $this;
    }

    public function getMarkingPosition(): MarkingPosition
    {
        return $this->markingPosition;
    }

    public function setMarkingPosition(MarkingPosition $markingPosition): self
    {
        $this->markingPosition = $markingPosition;

        return $this;
    }

    public function getSupplierMarking(): SupplierMarking
    {
        return $this->supplierMarking;
    }

    public function setSupplierMarking(SupplierMarking $supplierMarking): self
    {
        $this->supplierMarking = $supplierMarking;

        return $this;
    }

    public function getSupplierOptions(): Collection
    {
        return $this->supplierOptions;
    }

    public function setSupplierOptions(Collection $supplierOptions): self
    {
        $this->supplierOptions = $supplierOptions;

        return $this;
    }

    public function addSupplierOption(SupplierOption $supplierOption): self
    {
        $this->supplierOptions->add($supplierOption->getCode(), $supplierOption);

        return $this;
    }

    public function getSupplierProfiles(): Collection
    {
        return $this->supplierProfiles;
    }

    public function setSupplierProfiles(Collection $supplierProfiles): self
    {
        $this->supplierProfiles = $supplierProfiles;

        return $this;
    }

    public function addSupplierProfile(SupplierProfile $supplierProfile): self
    {
        $this->supplierProfiles->add($supplierProfile->getId(), $supplierProfile);

        return $this;
    }

    public function getStaticFixedPrices(): Collection
    {
        return $this->staticFixedPrices;
    }

    public function setStaticFixedPrices(Collection $staticFixedPrices): self
    {
        $this->staticFixedPrices = $staticFixedPrices;

        return $this;
    }

    public function addStaticFixedPrice(StaticFixedPrice $staticFixedPrice): self
    {
        $this->staticFixedPrices->add($staticFixedPrice->getId(), $staticFixedPrice);

        return $this;
    }

    public function getDynamicFixedPrices(): Collection
    {
        return $this->dynamicFixedPrices;
    }

    public function setDynamicFixedPrices(Collection $dynamicFixedPrices): self
    {
        $this->dynamicFixedPrices = $dynamicFixedPrices;

        return $this;
    }

    public function addDynamicFixedPrice(DynamicFixedPrice $dynamicFixedPrice): self
    {
        $this->dynamicFixedPrices->add($dynamicFixedPrice->getId(), $dynamicFixedPrice);

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

    public function addStaticVariablePriceHolder(StaticVariablePriceHolder $staticVariablePriceHolder): self
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

    public function addDynamicVariablePriceHolder(DynamicVariablePriceHolder $dynamicVariablePriceHolder): self
    {
        $this->dynamicVariablePriceHolders->add($dynamicVariablePriceHolder->getId(), $dynamicVariablePriceHolder);

        return $this;
    }

    public function isFreeEntrySquaredSize(): bool
    {
        return $this->freeEntrySquaredSize;
    }

    public function setFreeEntrySquaredSize(bool $freeEntrySquaredSize): VariantMarking
    {
        $this->freeEntrySquaredSize = $freeEntrySquaredSize;

        return $this;
    }

    public function isFreeEntryNumberOfLogos(): bool
    {
        return $this->freeEntryNumberOfLogos;
    }

    public function setFreeEntryNumberOfLogos(bool $freeEntryNumberOfLogos): VariantMarking
    {
        $this->freeEntryNumberOfLogos = $freeEntryNumberOfLogos;

        return $this;
    }

    public function isFreeEntryNumberOfColors(): bool
    {
        return $this->freeEntryNumberOfColors;
    }

    public function setFreeEntryNumberOfColors(bool $freeEntryNumberOfColors): VariantMarking
    {
        $this->freeEntryNumberOfColors = $freeEntryNumberOfColors;

        return $this;
    }

    public function isFreeEntryNumberOfPositions(): bool
    {
        return $this->freeEntryNumberOfPositions;
    }

    public function setFreeEntryNumberOfPositions(bool $freeEntryNumberOfPositions): VariantMarking
    {
        $this->freeEntryNumberOfPositions = $freeEntryNumberOfPositions;

        return $this;
    }
}
