<?php


namespace Alura\Architecture\Utils\Exceptions;

class InvalidCpfException extends \DomainException
{
    public function __construct($value)
    {
        $message = "Cpf $value is invalid!";
        parent::__construct($message);
    }

}