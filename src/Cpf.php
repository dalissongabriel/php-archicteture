<?php


namespace Alura\Architecture;


class Cpf
{
    private string $number;

    /**
     * Cpf constructor.
     * @param string $number
     */
    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function __toString()
    {
       return (string) $this->number;
    }
}