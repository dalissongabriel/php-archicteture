<?php

namespace Alura\Architecture\Domain\Student;

use Alura\Architecture\Domain\Share\Email;
use Alura\Architecture\Domain\Share\People;
use Alura\Architecture\Domain\Share\Cpf;

class Student extends People
{
    /**
     * Student named constructor  .
     * @param string $cpf
     * @param string $name
     * @param string $email
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


    public function __toString(): string
    {
        $phoneList ="";
        if($this->phones) {
            $phoneList = "Phones: " . PHP_EOL;
            /**
             * Phone $phone
             */
            foreach($this->phones as $phone) {
                $phoneList .=  "\t" . (string) $phone . PHP_EOL;
            }
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