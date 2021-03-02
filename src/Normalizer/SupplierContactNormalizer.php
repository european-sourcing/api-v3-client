<?php

namespace Medialeads\Apiv3Client\Normalizer;


use Medialeads\Apiv3Client\Model\SupplierContact;

class SupplierContactNormalizer
{
    /**
     * @param array $data
     *
     * @return SupplierContact
     */
    public function denormalize(array $data)
    {
        $supplierContact = new SupplierContact();

        if (!empty($data['emails'])) {
            $emails = [];
            foreach ($data['emails'] as $index => $email) {
                if ( !empty($email) ) {
                    $emails[] = $email;
                    if ($index == 0) {
                        $supplierContact->setMainEmail($email);
                    }
                }
            }
            if ( !empty($emails) ) {
                $supplierContact->setEmails($emails);
            }
        }

        if (!empty($data['personal_title'])) {
            $supplierContact->setPersonalTitle($data['personal_title']);
        }

        if (!empty($data['last_name'])) {
            $supplierContact->setLastName($data['last_name']);
        }

        if (!empty($data['first_name'])) {
            $supplierContact->setLastName($data['first_name']);
        }

        if (!empty($data['main_language'])) {
            $supplierContact->setMainLanguage($data['main_language']);
        }

        if (!empty($data['country_code'])) {
            $supplierContact->setCountryCode($data['country_code']);
        }

        return $supplierContact;
    }
}