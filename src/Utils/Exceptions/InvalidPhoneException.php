<?php


namespace Alura\Architecture\Utils\Exceptions;

use DomainException;

class InvalidPhoneException extends DomainException
{
    public function __construct(string $phone)
    {
        $message = "Phone: $phone is invalid!";
        parent::__construct($message);
    }

}