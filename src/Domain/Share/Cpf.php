<?php


namespace Alura\Architecture\Domain\Student;


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
        $this->setCpf($number);
    }

    private function setCpf(string $number): self
    {
        if( !CpfValidator::isValid($number) ) {
            throw new InvalidCpfException($number);
        }
        
        $this->number = $number;
        return $this;
    }

    public function __toString(): string
    {
       return (string) $this->number;
    }
}