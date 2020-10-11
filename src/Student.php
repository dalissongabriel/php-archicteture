<?php


namespace Alura\Architecture;

class Student
{
    private Cpf $cpf;
    private string $name;
    private Email $email;

    public function setEmailAddress(string $address): self
    {
        $this->email = new Email($address);
        return $this;
    }

    public function getEmailAddress(): Email
    {
        return $this->email;
    }

}