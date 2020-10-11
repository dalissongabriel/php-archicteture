<?php

namespace Alura\Architecture;

class Phone
{
    private string $ddd;
    private string $number;

    /**
     * Phone constructor.
     * @param string $ddd
     * @param string $number
     */
    public function __construct(string $ddd, string $number)
    {
        $this->ddd = $ddd;
        $this->number = $number;
    }

    public function __toString(): string
    {
        return "({$this->ddd}) {$this->number}";
    }
}