<?php


namespace Alura\Architecture\Utils\Exceptions;

use DomainException;

class InvalidEmailException extends DomainException
{
    public function __construct($value)
    {
        $message = "Email: $value is invalid!";
        parent::__construct($message);
    }

}