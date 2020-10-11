<?php


namespace Alura\Architecture;


use Alura\Architecture\Helpers\CpfValidator;
use Alura\Architecture\Utils\Exceptions\InvalidCpfException;

class Cpf
{
    private string $number;

    /**
     * Cpf constructor.
     * @param string $number
     */
    public function __construct(string $number)
    {
        if( !CpfValidator::isValid($number) ) {
            throw new InvalidCpfException($number);
        };

        $this->number = $number;
    }

    public function __toString()
    {
       return (string) $this->number;
    }
}