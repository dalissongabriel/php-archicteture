<?php

namespace Alura\Architecture\Domain\Student;

use Alura\Architecture\Domain\Share\Email;
use Alura\Architecture\Domain\Share\Phone;

class Student
{
    private Cpf $cpf;
    private string $name;
    private Email $email;
    private array $phones;

    /**
     * Student constructor.
     * @param Cpf $cpf
     * @param string $name
     * @param Email $email
     */
    public function __construct(Cpf $cpf, string $name, Email $email)
    {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
    }

    public static function withEmailCpfName(string $email, string $cpf, string $name): self
    {
        $emailObj = new Email($email);
        $cpfObj = new Cpf($cpf);
        $student = new Student($cpfObj, $name, $emailObj);
        return $student;
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