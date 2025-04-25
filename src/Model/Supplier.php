<?php

namespace EuropeanSourcing\Apiv3Client\Model;

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
     * @var array
     */
    private $supplierContacts;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id): static
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
     */
    public function setName($name): static
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
     */
    public function setSlug($slug): static
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
     */
    public function setLegalName($legalName): static
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
     */
    public function setVatIdentificationNumber($vatIdentificationNumber): static
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
     */
    public function setCount($count): static
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
     */
    public function setSupplierProfiles($supplierProfiles): static
    {
        $this->supplierProfiles = $supplierProfiles;

        return $this;
    }

    public function addSupplierProfile(SupplierProfile $supplierProfile): static
    {
        $this->supplierProfiles[] = $supplierProfile;

        return $this;
    }

    /**
     * @return array
     */
    public function getSupplierContacts()
    {
        return $this->supplierContacts;
    }

    /**
     * @param array $supplierContacts
     */
    public function setSupplierContacts($supplierContacts): static
    {
        $this->supplierContacts = $supplierContacts;

        return $this;
    }

    public function addSupplierContact(SupplierContact $supplierContact): static
    {
        $this->supplierContacts[] = $supplierContact;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
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
