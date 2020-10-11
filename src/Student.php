<?php


namespace Alura\Architecture;

class Student
{
    private Cpf $cpf;
    private string $name;
    private Email $email;

    public function setEmailAddress(string $address)
    {
        $this->email = new Email($address);
        return $this;
    }

    public function getEmailAddress(): Email
    {
        return $this->email;
    }

    public function setCpf(string $cpf)
    {
        $this->cpf = new Cpf($cpf);
    }

    public function getCpf()
    {
        return $this->cpf;
    }

}