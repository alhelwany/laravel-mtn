<?php

namespace Alhelwany\LaravelMtn\Utilities;

use Alhelwany\LaravelMtn\Exceptions\InvalidPhoneNumberLengthException;

class PhoneFormatter
{
    /**
     * Formats Phone number into this format 963912312312
     *
     * @throws InvalidPhoneNumberLengthException
     */
    private function format(string $phone): string
    {
        if (strlen($phone) == 10) {
            return '963'.substr($phone, 1);
        }
        throw new InvalidPhoneNumberLengthException;
    }

    /**
     * Formats All Phone Numbers into one string seperated by ';'
     */
    public function formatMany(array $phoneNumbers): string
    {
        $formattedPhoneNumbers = [];
        foreach ($phoneNumbers as $phone) {
            $formattedPhoneNumbers[] = $this->format($phone);
        }

        return implode(';', $formattedPhoneNumbers);
    }
}
