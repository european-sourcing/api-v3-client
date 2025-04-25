<?php

namespace EuropeanSourcing\Apiv3Client\Model\Marking;

use EuropeanSourcing\Apiv3Client\Common\Collection;

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

    /** @var float */
    private $length;

    /** @var float */
    private $minimumLength;

    /** @var float */
    private $maximumLength;

    /** @var int */
    private $diameter;

    /** @var float */
    private $minimumDiameter;

    /** @var float */
    private $maximumDiameter;

    /** @var float */
    private $squaredSize;

    /** @var float */
    private $minimumSquaredSize;

    /** @var float */
    private $maximumSquaredSize;

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
    private $fullColor;

    /** @var int */
    private $numberOfColors;

    /** @var int */
    private $minimumNumberOfColors;

    /** @var int */
    private $maximumNumberOfColors;

    /** @var int */
    private $numberOfPositions;

    /** @var int */
    private $minimumNumberOfPositions;

    /** @var int */
    private $maximumNumberOfPositions;

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

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getKey(): int
    {
        return $this->key;
    }

    public function setKey(int $key): static
    {
        $this->key = $key;

        return $this;
    }

    public function isIncludedInVariantPrices(): bool
    {
        return $this->includedInVariantPrices;
    }

    public function setIncludedInVariantPrices(bool $includedInVariantPrices): static
    {
        $this->includedInVariantPrices = $includedInVariantPrices;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getWidth(): ?float
    {
        return $this->width;
    }

    public function setWidth(?float $width): static
    {
        $this->width = $width;

        return $this;
    }

    public function getMinimumWidth(): ?float
    {
        return $this->minimumWidth;
    }

    public function setMinimumWidth(?float $minimumWidth): static
    {
        $this->minimumWidth = $minimumWidth;

        return $this;
    }

    public function getMaximumWidth(): ?float
    {
        return $this->maximumWidth;
    }

    public function setMaximumWidth(?float $maximumWidth): static
    {
        $this->maximumWidth = $maximumWidth;

        return $this;
    }

    public function getLength(): ?float
    {
        return $this->length;
    }

    public function setLength(?float $length): static
    {
        $this->length = $length;

        return $this;
    }

    public function getMinimumLength(): ?float
    {
        return $this->minimumLength;
    }

    public function setMinimumLength(?float $minimumLength): static
    {
        $this->minimumLength = $minimumLength;

        return $this;
    }

    public function getMaximumLength(): ?float
    {
        return $this->maximumLength;
    }

    public function setMaximumLength(?float $maximumLength): static
    {
        $this->maximumLength = $maximumLength;

        return $this;
    }

    public function getDiameter(): ?int
    {
        return $this->diameter;
    }

    public function setDiameter(?int $diameter): static
    {
        $this->diameter = $diameter;

        return $this;
    }

    public function getMinimumDiameter(): ?float
    {
        return $this->minimumDiameter;
    }

    public function setMinimumDiameter(?float $minimumDiameter): static
    {
        $this->minimumDiameter = $minimumDiameter;

        return $this;
    }

    public function getMaximumDiameter(): ?float
    {
        return $this->maximumDiameter;
    }

    public function setMaximumDiameter(?float $maximumDiameter): static
    {
        $this->maximumDiameter = $maximumDiameter;

        return $this;
    }

    public function isFullColor(): bool
    {
        return $this->fullColor;
    }

    public function setFullColor(bool $fullColor): static
    {
        $this->fullColor = $fullColor;

        return $this;
    }

    public function getSquaredSize(): ?float
    {
        return $this->squaredSize;
    }

    public function setSquaredSize(?float $squaredSize): static
    {
        $this->squaredSize = $squaredSize;

        return $this;
    }

    public function getMinimumSquaredSize(): ?float
    {
        return $this->minimumSquaredSize;
    }

    public function setMinimumSquaredSize(?float $minimumSquaredSize): static
    {
        $this->minimumSquaredSize = $minimumSquaredSize;

        return $this;
    }

    public function getMaximumSquaredSize(): ?float
    {
        return $this->maximumSquaredSize;
    }

    public function setMaximumSquaredSize(?float $maximumSquaredSize): static
    {
        $this->maximumSquaredSize = $maximumSquaredSize;

        return $this;
    }

    public function getMinimumQuantity(): ?int
    {
        return $this->minimumQuantity;
    }

    public function setMinimumQuantity(?int $minimumQuantity): static
    {
        $this->minimumQuantity = $minimumQuantity;

        return $this;
    }

    public function getMaximumQuantity(): ?int
    {
        return $this->maximumQuantity;
    }

    public function setMaximumQuantity(?int $maximumQuantity): static
    {
        $this->maximumQuantity = $maximumQuantity;

        return $this;
    }

    public function getNumberOfLogos(): ?int
    {
        return $this->numberOfLogos;
    }

    public function setNumberOfLogos(?int $numberOfLogos): static
    {
        $this->numberOfLogos = $numberOfLogos;

        return $this;
    }

    public function getMinimumNumberOfLogos(): ?int
    {
        return $this->minimumNumberOfLogos;
    }

    public function setMinimumNumberOfLogos(?int $minimumNumberOfLogos): static
    {
        $this->minimumNumberOfLogos = $minimumNumberOfLogos;

        return $this;
    }

    public function getMaximumNumberOfLogos(): ?int
    {
        return $this->maximumNumberOfLogos;
    }

    public function setMaximumNumberOfLogos(?int $maximumNumberOfLogos): static
    {
        $this->maximumNumberOfLogos = $maximumNumberOfLogos;

        return $this;
    }

    public function getNumberOfColors(): ?int
    {
        return $this->numberOfColors;
    }

    public function setNumberOfColors(?int $numberOfColors): static
    {
        $this->numberOfColors = $numberOfColors;

        return $this;
    }

    public function getMinimumNumberOfColors(): ?int
    {
        return $this->minimumNumberOfColors;
    }

    public function setMinimumNumberOfColors(?int $minimumNumberOfColors): static
    {
        $this->minimumNumberOfColors = $minimumNumberOfColors;

        return $this;
    }

    public function getMaximumNumberOfColors(): ?int
    {
        return $this->maximumNumberOfColors;
    }

    public function setMaximumNumberOfColors(?int $maximumNumberOfColors): static
    {
        $this->maximumNumberOfColors = $maximumNumberOfColors;

        return $this;
    }

    public function getNumberOfPositions(): ?int
    {
        return $this->numberOfPositions;
    }

    public function setNumberOfPositions(?int $numberOfPositions): static
    {
        $this->numberOfPositions = $numberOfPositions;

        return $this;
    }

    public function getMinimumNumberOfPositions(): ?int
    {
        return $this->minimumNumberOfPositions;
    }

    public function setMinimumNumberOfPositions(?int $minimumNumberOfPositions): static
    {
        $this->minimumNumberOfPositions = $minimumNumberOfPositions;

        return $this;
    }

    public function getMaximumNumberOfPositions(): ?int
    {
        return $this->maximumNumberOfPositions;
    }

    public function setMaximumNumberOfPositions(?int $maximumNumberOfPositions): static
    {
        $this->maximumNumberOfPositions = $maximumNumberOfPositions;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getMarking(): Marking
    {
        return $this->marking;
    }

    public function setMarking(Marking $marking): static
    {
        $this->marking = $marking;

        return $this;
    }

    public function getMarkingPosition(): ?MarkingPosition
    {
        return $this->markingPosition;
    }

    public function setMarkingPosition(MarkingPosition $markingPosition): static
    {
        $this->markingPosition = $markingPosition;

        return $this;
    }

    public function getSupplierMarking(): SupplierMarking
    {
        return $this->supplierMarking;
    }

    public function setSupplierMarking(SupplierMarking $supplierMarking): static
    {
        $this->supplierMarking = $supplierMarking;

        return $this;
    }

    public function getSupplierOptions(): Collection
    {
        return $this->supplierOptions;
    }

    public function setSupplierOptions(Collection $supplierOptions): static
    {
        $this->supplierOptions = $supplierOptions;

        return $this;
    }

    public function addSupplierOption(SupplierOption $supplierOption): static
    {
        $this->supplierOptions->add($supplierOption->getCode(), $supplierOption);

        return $this;
    }

    public function getSupplierProfiles(): Collection
    {
        return $this->supplierProfiles;
    }

    public function setSupplierProfiles(Collection $supplierProfiles): static
    {
        $this->supplierProfiles = $supplierProfiles;

        return $this;
    }

    public function addSupplierProfile(SupplierProfile $supplierProfile): static
    {
        $this->supplierProfiles->add($supplierProfile->getId(), $supplierProfile);

        return $this;
    }

    public function getStaticFixedPrices(): Collection
    {
        return $this->staticFixedPrices;
    }

    public function setStaticFixedPrices(Collection $staticFixedPrices): static
    {
        $this->staticFixedPrices = $staticFixedPrices;

        return $this;
    }

    public function addStaticFixedPrice(StaticFixedPrice $staticFixedPrice): static
    {
        $this->staticFixedPrices->add($staticFixedPrice->getId(), $staticFixedPrice);

        return $this;
    }

    public function getDynamicFixedPrices(): Collection
    {
        return $this->dynamicFixedPrices;
    }

    public function setDynamicFixedPrices(Collection $dynamicFixedPrices): static
    {
        $this->dynamicFixedPrices = $dynamicFixedPrices;

        return $this;
    }

    public function addDynamicFixedPrice(DynamicFixedPrice $dynamicFixedPrice): static
    {
        $this->dynamicFixedPrices->add($dynamicFixedPrice->getId(), $dynamicFixedPrice);

        return $this;
    }

    public function getStaticVariablePriceHolders(): Collection
    {
        return $this->staticVariablePriceHolders;
    }

    public function setStaticVariablePriceHolders(Collection $staticVariablePriceHolders): static
    {
        $this->staticVariablePriceHolders = $staticVariablePriceHolders;

        return $this;
    }

    public function addStaticVariablePriceHolder(StaticVariablePriceHolder $staticVariablePriceHolder): static
    {
        $this->staticVariablePriceHolders->add($staticVariablePriceHolder->getId(), $staticVariablePriceHolder);

        return $this;
    }

    public function getDynamicVariablePriceHolders(): Collection
    {
        return $this->dynamicVariablePriceHolders;
    }

    public function setDynamicVariablePriceHolders(Collection $dynamicVariablePriceHolders): static
    {
        $this->dynamicVariablePriceHolders = $dynamicVariablePriceHolders;

        return $this;
    }

    public function addDynamicVariablePriceHolder(DynamicVariablePriceHolder $dynamicVariablePriceHolder): static
    {
        $this->dynamicVariablePriceHolders->add($dynamicVariablePriceHolder->getId(), $dynamicVariablePriceHolder);

        return $this;
    }
}
