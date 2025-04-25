<?php


namespace EuropeanSourcing\Apiv3Client\Model;


class SupplierContact implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $mainEmail;
    
    /**
     * @var array|null
     */
    private $emails;
    
    /**
     * @var array|null
     */
    private $phoneNumbers;

    /**
     * @var array|null
     */
    private $faxNumbers;

    /**
     * @var string|null
     */
    private $personalTitle;

    /**
     * @var string|null
     */
    private $lastname;

    /**
     * @var string|null
     */
    private $firstname;

    /**
     * @var string|null
     */
    private $mainLanguage;

    /**
     * @var array|null
     */
    private $languages;

    /**
     * @var string|null
     */
    private $countryCode;

    /**
     * @var null|array{address_line1: string, address_line2: string|null, postal_code: string|null, country_code: string, locality: string}
     */
    private $address;

    public function getMainEmail(): ?string
    {
        return $this->mainEmail;
    }

    public function setMainEmail(?string $mainEmail): void
    {
        $this->mainEmail = $mainEmail;
    }

    public function getEmails(): ?array
    {
        return $this->emails;
    }

    public function setEmails(?array $emails): void
    {
        $this->emails = $emails;
    }

    public function getPersonalTitle(): ?string
    {
        return $this->personalTitle;
    }

    public function setPersonalTitle(?string $personalTitle): void
    {
        $this->personalTitle = $personalTitle;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getMainLanguage(): ?string
    {
        return $this->mainLanguage;
    }

    public function setMainLanguage(?string $mainLanguage): void
    {
        $this->mainLanguage = $mainLanguage;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return array<string>|null
     */
    public function getPhoneNumbers(): ?array
    {
        return $this->phoneNumbers;
    }

    /**
     * @param array<string>|null $phoneNumbers
     */
    public function setPhoneNumbers(?array $phoneNumbers): void
    {
        $this->phoneNumbers = $phoneNumbers;
    }

    /**
     * @return array<string>|null
     */
    public function getFaxNumbers(): ?array
    {
        return $this->faxNumbers;
    }

    /**
     * @param array<string>|null $faxNumbers
     */
    public function setFaxNumbers(?array $faxNumbers): void
    {
        $this->faxNumbers = $faxNumbers;
    }

    /**
     * @return array<string>|null
     */
    public function getLanguages(): ?array
    {
        return $this->languages;
    }

    /**
     * @param array<string>|null $languages
     */
    public function setLanguages(?array $languages): void
    {
        $this->languages = $languages;
    }

    /**
     * @return null|array{address_line1: string, address_line2: string|null, postal_code: string|null, country_code: string, locality: string}
     */
    public function getAddress(): ?array
    {
        return $this->address;
    }

    /**
     * @param null|array{address_line1: string, address_line2: string|null, postal_code: string|null, country_code: string, locality: string} $address
     */
    public function setAddress(?array $address): void
    {
        $this->address = $address;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'main_email' => $this->mainEmail,
            'emails' => $this->emails,
            'personal_title' => $this->personalTitle,
            'last_name' => $this->lastname,
            'first_name' => $this->firstname,
            'country_code' => $this->countryCode,
            'main_language' => $this->mainLanguage,
            'languages' => $this->languages,
            'phone_numbers' => $this->phoneNumbers,
            'fax_numbers' => $this->faxNumbers,
            'address' => $this->address,
        ];
    }
}
