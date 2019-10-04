<?php

namespace Medialeads\Apiv3Client\Model;

class Supplier implements \JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $legalName;

    /**
     * @var string
     */
    private $vatIdentificationNumber;

    /**
     * @var int
     */
    private $count;

    /**
     * @var array
     */
    private $supplierProfiles;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Supplier
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Supplier
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     *
     * @return Supplier
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return string
     */
    public function getLegalName()
    {
        return $this->legalName;
    }

    /**
     * @param string $legalName
     *
     * @return Supplier
     */
    public function setLegalName($legalName)
    {
        $this->legalName = $legalName;

        return $this;
    }

    /**
     * @return string
     */
    public function getVatIdentificationNumber()
    {
        return $this->vatIdentificationNumber;
    }

    /**
     * @param string $vatIdentificationNumber
     *
     * @return Supplier
     */
    public function setVatIdentificationNumber($vatIdentificationNumber)
    {
        $this->vatIdentificationNumber = $vatIdentificationNumber;

        return $this;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $count
     *
     * @return Supplier
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * @return array
     */
    public function getSupplierProfiles()
    {
        return $this->supplierProfiles;
    }

    /**
     * @param array $supplierProfiles
     *
     * @return Supplier
     */
    public function setSupplierProfiles($supplierProfiles)
    {
        $this->supplierProfiles = $supplierProfiles;

        return $this;
    }

    /**
     * @param SupplierProfile $supplierProfile
     *
     * @return Supplier
     */
    public function addSupplierProfile(SupplierProfile $supplierProfile)
    {
        $this->supplierProfiles[] = $supplierProfile;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'legal_name' => $this->legalName,
            'vat_identification_number' => $this->vatIdentificationNumber,
            'count' => $this->count,
            'supplier_profiles' => $this->supplierProfiles
        ];
    }
}
