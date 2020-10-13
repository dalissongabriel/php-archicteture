<?php

namespace Alura\Architecture\Domain\Student;

use Alura\Architecture\Domain\Share\Address;
use Alura\Architecture\Domain\Share\Email;
use Alura\Architecture\Domain\Share\Phone;

class Student
{
    private Cpf $cpf;
    private string $name;
    private Email $email;
    private array $phones;
    private Address $address;


    /**
     * Student named constructor  .
     * @param Cpf $cpf
     * @param string $name
     * @param Email $email
     */
    public static function withEmailCpfName(string $email, string $cpf, string $name): self
    {
        $student = new Student();
        $student
            ->setEmailAddress(new Email($email))
            ->setCpf(new Cpf($cpf))
            ->setName($name);
        return $student;
    }

    /**
     * @param string $street
     * @param int $number
     * @param string $neighborhood
     * @param string $city
     * @param string $state
     * @param string|null $compl
     */
    public function setAddress(string $street, int $number, string $neighborhood, string $city, string $state, string $compl = null): self
    {
        $this->address = new Address();
        $this->address->setStreet($street);
        $this->address->setNeighborhood($neighborhood);
        $this->address->setCity($city);
        $this->address->setState($state);
        $this->address->setNumber($number);
        if( $compl !== null ) {
            $this->address->setCompl($compl);
        }
        return $this;

    }

    public function getAddress(): Address
    {
        return $this->address;
    }


    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setEmailAddress(string $address): self
    {
        $this->email = new Email($address);
        return $this;
    }

    public function getEmailAddress(): Email
    {
        return $this->email;
    }

    public function setCpf(string $cpf): self
    {
        $this->cpf = new Cpf($cpf);
        return $this;
    }

    public function getCpf(): Cpf
    {
        return $this->cpf;

    }
    public function addPhone($ddd, $number): self
    {
        $this->phones[] = new Phone($ddd,$number);
        return $this;
    }

    public function getPhone(): Phone
    {
        return $this->phones[0];
    }

    public function getPhones(): array
    {
        return $this->phones;
    }

    public function __toString(): string
    {
        $phoneList = "Phones: " . PHP_EOL;
        /**
         * Phone $phone
         */
        foreach($this->phones as $phone) {
            $phoneList .=  "\t" . (string) $phone . PHP_EOL;
        }

        return
        "Student: " .PHP_EOL.
        "\tName: $this->name" .PHP_EOL.
        "\tE-mail: $this->email" .PHP_EOL.
        "\tCpf: $this->cpf" . PHP_EOL .
        (string) $this->getAddress() . PHP_EOL .
        $phoneList;
    }

}