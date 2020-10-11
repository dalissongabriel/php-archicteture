<?php

namespace Alura\Architecture\Domain\Share;

use Alura\Architecture\Helpers\PhoneValidator;
use Alura\Architecture\Utils\Exceptions\InvalidPhoneException;

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
        $this->setPhone($ddd,$number);
    }

    private function setPhone(string $ddd ,string $number): self
    {
        $phone = "($ddd) $number";
        if(!PhoneValidator::isValid($phone)){
            throw new InvalidPhoneException($phone);
        }
        $this->ddd = $ddd;
        $this->number = $number;
        return $this;
    }
    public function __toString(): string
    {
        return "({$this->ddd}) {$this->number}";
    }
}