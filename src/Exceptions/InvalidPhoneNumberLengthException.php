<?php

namespace Alhelwany\LaravelMtn\Exceptions;

use Exception;

class InvalidPhoneNumberLengthException extends Exception
{
    public function __construct()
    {
        $message = "Phone number length is invalid, make sure the number is in this format: '0912312312' ";
        parent::__construct($message);
    }
}
