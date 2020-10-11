<?php


namespace Alura\Architecture;

use Alura\Architecture\Helpers\EmailValidator;
use Alura\Architecture\Utils\Exceptions\InvalidEmailException;

class Email
{
    private string $address;

    /**
     * Email constructor.
     * @param string $address
     */
    public function __construct(string $address)
    {
        if(!EmailValidator::isValid($address)){
            throw new InvalidEmailException($address);
        }
        $this->address = $address;
    }


    public function __toString()
    {
        return (string) $this->address;
    }

}