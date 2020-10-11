<?php


namespace Alura\Architecture\Domain\Share;

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
        $this->setEmail($address);
    }

    private function setEmail(string $address): self
    {
        if(!EmailValidator::isValid($address)){
            throw new InvalidEmailException($address);
        }
        $this->address = $address;
        return $this;
    }

    public function __toString()
    {
        return (string) $this->address;
    }

}