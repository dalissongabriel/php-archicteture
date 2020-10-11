<?php


namespace Alura\Architecture;


class Email
{
    private string $address;

    /**
     * Email constructor.
     * @param string $address
     */
    public function __construct(string $address)
    {
        $this->address = $address;
    }


    public function __toString()
    {
        return (string) $this->address;
    }

}