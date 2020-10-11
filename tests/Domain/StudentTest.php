<?php

namespace Alura\Tests;


use Alura\Architecture\Domain\Share\Email;
use Alura\Architecture\Domain\Share\Phone;
use Alura\Architecture\Domain\Student\Cpf;
use Alura\Architecture\Domain\Student\Student;



use Alura\Architecture\Utils\Exceptions\InvalidCpfException;
use Alura\Architecture\Utils\Exceptions\InvalidEmailException;
use Alura\Architecture\Utils\Exceptions\InvalidPhoneException;

use PHPUnit\Framework\TestCase;

class StudentTest extends TestCase
{
    public function testMustEnsureStudentHasEmailAddress(){
        $student = Student::withEmailCpfName("anyemail@mail.com","123.456.789-09","Any name");

        $this->assertSame("anyemail@mail.com", (string) $student->getEmailAddress());
        $this->assertInstanceOf(Email::class, $student->getEmailAddress());
    }

    public function testMustEnsureStudentHasCpf(){
        $student = Student::withEmailCpfName("anyemail@mail.com","123.456.789-09","Any name");
        $this->assertSame("123.456.789-09", (string) $student->getCpf());
        $this->assertInstanceOf(Cpf::class, $student->getCpf());
    }

    public function testMustEnsureThatTheCpfIsNotValid(){
        $this->expectException(InvalidCpfException::class);
        Student::withEmailCpfName("anyemail@mail.com","11.22.33-01","Any name");
    }

    public function testMustEnsureThatTheEmailIsNotValid(){
        $this->expectException(InvalidEmailException::class);
        Student::withEmailCpfName("anyinvalidemailaddress","11.22.33-01","Any name");
    }

    public function testMustEnsureStudentHasAnPhone(){
        $student = Student::withEmailCpfName("anyemail@mail.com","123.456.789-09","Any name");
        $resultSet = $student->addPhone("49","988776543");
        $resultGetPhone = $student->getPhone();
        $this->assertSame("(49) 988776543", (string) $resultGetPhone);
        $this->assertInstanceOf(Phone::class, $student->getPhone());
        $this->assertInstanceOf(Student::class, $resultSet);
    }

    public function testMustEnsureThatThePhoneIsNotValid(){
        $this->expectException(InvalidPhoneException::class);
        $student = Student::withEmailCpfName("anyemail@mail.com","123.456.789-09","Any name");
        $student->addPhone("9","988776");
    }


}
