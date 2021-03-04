<?php


namespace Medialeads\Apiv3Client\Model;


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
     * @var string|null
     */
    private $countryCode;

    /**
     * @return string|null
     */
    public function getMainEmail(): ?string
    {
        return $this->mainEmail;
    }

    /**
     * @param string|null $mainEmail
     */
    public function setMainEmail(?string $mainEmail): void
    {
        $this->mainEmail = $mainEmail;
    }

    /**
     * @return array|null
     */
    public function getEmails(): ?array
    {
        return $this->emails;
    }

    /**
     * @param array|null $emails
     */
    public function setEmails(?array $emails): void
    {
        $this->emails = $emails;
    }

    /**
     * @return string|null
     */
    public function getPersonalTitle(): ?string
    {
        return $this->personalTitle;
    }

    /**
     * @param string|null $personalTitle
     */
    public function setPersonalTitle(?string $personalTitle): void
    {
        $this->personalTitle = $personalTitle;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string|null $lastname
     */
    public function setLastname(?string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string|null $firstname
     */
    public function setFirstname(?string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string|null
     */
    public function getMainLanguage(): ?string
    {
        return $this->mainLanguage;
    }

    /**
     * @param string|null $mainLanguage
     */
    public function setMainLanguage(?string $mainLanguage): void
    {
        $this->mainLanguage = $mainLanguage;
    }

    /**
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @param string|null $countryCode
     */
    public function setCountryCode(?string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'main_email' => $this->mainEmail,
            'emails' => $this->emails,
            'personal_title' => $this->personalTitle,
            'last_name' => $this->lastname,
            'first_name' => $this->firstname,
            'country_code' => $this->countryCode,
            'main_language' => $this->mainLanguage
        ];
    }
}
