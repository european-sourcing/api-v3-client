<?php


namespace Medialeads\Apiv3Client\Model;


class SupplierContact implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $main_email;
    /**
     * @var array|null
     */
    private $emails;

    /**
     * @var string|null
     */
    private $personal_title;

    /**
     * @var string|null
     */
    private $last_name;

    /**
     * @var string|null
     */
    private $first_name;

    /**
     * @var string|null
     */
    private $main_language;

    /**
     * @var string|null
     */
    private $country_code;

    /**
     * @return string|null
     */
    public function getMainEmail(): ?string
    {
        return $this->main_email;
    }

    /**
     * @param string|null $main_email
     */
    public function setMainEmail(?string $main_email): void
    {
        $this->main_email = $main_email;
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
        return $this->personal_title;
    }

    /**
     * @param string|null $personal_title
     */
    public function setPersonalTitle(?string $personal_title): void
    {
        $this->personal_title = $personal_title;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * @param string|null $last_name
     */
    public function setLastName(?string $last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    /**
     * @param string|null $first_name
     */
    public function setFirstName(?string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string|null
     */
    public function getMainLanguage(): ?string
    {
        return $this->main_language;
    }

    /**
     * @param string|null $main_language
     */
    public function setMainLanguage(?string $main_language): void
    {
        $this->main_language = $main_language;
    }

    /**
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->country_code;
    }

    /**
     * @param string|null $country_code
     */
    public function setCountryCode(?string $country_code): void
    {
        $this->country_code = $country_code;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'main_email' => $this->main_email,
            'emails' => $this->emails,
            'personal_title' => $this->personal_title,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'country_code' => $this->country_code,
            'main_language' => $this->main_language
        ];
    }
}