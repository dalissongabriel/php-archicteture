<?php

namespace Alura\Tests;


use Alura\Architecture\Cpf;
use Alura\Architecture\Email;
use Alura\Architecture\Student;
use Alura\Architecture\Phone;
use Alura\Architecture\Utils\Exceptions\InvalidCpfException;
use Alura\Architecture\Utils\Exceptions\InvalidEmailException;

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

    public function testMustEnsureThatTheEmailIsNotValid(){
        $this->expectException(InvalidEmailException::class);
        $student = new Student();
        $student->setEmailAddress("anyinvalidemailaddress");
    }

    public function testMustEnsureStudentHasAnPhone(){
        $student = new Student();
        $resultSet = $student->addPhone("49","988776543");
        $resultGetPhone = $student->getPhone();
        $this->assertSame("(49) 988776543", (string) $resultGetPhone);
        $this->assertInstanceOf(Phone::class, $student->getPhone());
        $this->assertInstanceOf(Student::class, $resultSet);
    }

}
