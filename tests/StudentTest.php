<?php

namespace Alura\Tests;


use Alura\Architecture\Cpf;
use Alura\Architecture\Email;
use Alura\Architecture\Student;
use Alura\Architecture\Utils\Exceptions\InvalidCpfException;

use PHPUnit\Framework\TestCase;

class StudentTest extends TestCase
{
    public function testMustEnsureStudentHasEmailAddress(){
        $student = new Student();
        $resultSet  = $student->setEmailAddress("anyemail@mail.com");
        $this->assertSame("anyemail@mail.com", (string) $student->getEmailAddress());
        $this->assertInstanceOf(Email::class, $student->getEmailAddress());
        $this->assertInstanceOf(Student::class, $resultSet);
    }

    public function testMustEnsureStudentHasCpf(){
        $student = new Student();
        $resultSet = $student->setCpf("123.456.789-09");
        $this->assertSame("123.456.789-09", (string) $student->getCpf());
        $this->assertInstanceOf(Cpf::class, $student->getCpf());
        $this->assertInstanceOf(Student::class, $resultSet);
    }

    public function testMustEnsureThatTheCpfIsNotValid(){
        $this->expectException(InvalidCpfException::class);
        $student = new Student();
        $student->setCpf("11.22.33-01");
    }

}
