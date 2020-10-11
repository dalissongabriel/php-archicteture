<?php


namespace Alura\Architecture\Utils\Exceptions;

class InvalidEmailException extends \DomainException
{
    public function __construct($value)
    {
        $message = "Email: $value is invalid!";
        parent::__construct($message);
    }

}