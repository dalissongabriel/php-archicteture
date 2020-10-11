<?php


namespace Alura\Architecture;

class Student
{
    private Cpf $cpf;
    private string $name;
    private Email $email;
    private array $phones;

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
    public function AddPhone($ddd, $number): self
    {
        $this->phones[] = new Phone($ddd,$number);
        return $this;
    }

    public function getPhone(): Phone
    {
        return $this->phones[0];
    }

}