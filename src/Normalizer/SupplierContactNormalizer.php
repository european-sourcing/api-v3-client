<?php

namespace EuropeanSourcing\Apiv3Client\Normalizer;

use EuropeanSourcing\Apiv3Client\Model\SupplierContact;

class SupplierContactNormalizer
{
    public function denormalize(array $data): SupplierContact
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

        if (!empty($data['phone_numbers'])) {
            $phoneNumbers = [];
            foreach ($data['phone_numbers'] as $index => $phone) {
                if ( !empty($phone) ) {
                    if ( !empty($phone['number']) ) {
                        $phoneNumber = $phone['number'];
                        if ( !empty($phone['prefix']) ) {
                            $phoneNumber = sprintf('+%s %s', $phone['prefix'], $phoneNumber);
                        }
                    }
                    $phoneNumbers[] = $phoneNumber;
                }
            }
            if ( !empty($phoneNumbers) ) {
                $supplierContact->setPhoneNumbers($phoneNumbers);
            }
        }

        if (!empty($data['fax_numbers'])) {
            $faxNumbers = [];
            foreach ($data['fax_numbers'] as $index => $fax) {
                if ( !empty($fax) ) {
                    if ( !empty($fax['number']) ) {
                        $faxNumber = $fax['number'];
                        if ( !empty($fax['prefix']) ) {
                            $faxNumber = sprintf('+%s %s', $fax['prefix'], $faxNumber);
                        }
                    }
                    $faxNumbers[] = $faxNumber;
                }
            }
            if ( !empty($faxNumbers) ) {
                $supplierContact->setFaxNumbers($faxNumbers);
            }
        }

        if (!empty($data['languages'])) {
            $languages = [];
            foreach ($data['languages'] as $index => $language) {
                if ( !empty($language) && strlen($language) == 2 ) {
                    $languages[] = $language;
                }
            }
            if ( !empty($languages) ) {
                $supplierContact->setLanguages($languages);
            }
        }

        if (!empty($data['personal_title'])) {
            $supplierContact->setPersonalTitle($data['personal_title']);
        }

        if (!empty($data['last_name'])) {
            $supplierContact->setLastname($data['last_name']);
        }

        if (!empty($data['first_name'])) {
            $supplierContact->setFirstname($data['first_name']);
        }

        if (!empty($data['main_language'])) {
            $supplierContact->setMainLanguage($data['main_language']);
        }

        if (!empty($data['country_code'])) {
            $supplierContact->setCountryCode($data['country_code']);
        }

        if (!empty($data['address'])) {
            $supplierContact->setAddress($data['address']);
        }

        return $supplierContact;
    }
}
