<?php

namespace Alura\Tests;


use Alura\Architecture\Domain\Share\Address;
use Alura\Architecture\Domain\Share\Email;
use Alura\Architecture\Domain\Share\Phone;
use Alura\Architecture\Domain\Share\Cpf;
use Alura\Architecture\Domain\Student\Student;
use Alura\Architecture\Domain\Student\StudentBuilder;


use Alura\Architecture\Utils\Exceptions\InvalidCpfException;
use Alura\Architecture\Utils\Exceptions\InvalidEmailException;
use Alura\Architecture\Utils\Exceptions\InvalidPhoneException;


use PHPUnit\Framework\TestCase;

class StudentTest extends TestCase
{
    public function testMustEnsureStudentHasEmailAddress(){
        $student = Student::withEmailCpfName(
                "anyemail@mail.com",
                "123.456.789-09",
                "Any name");

        $this->assertSame(
            "anyemail@mail.com",
            (string) $student->getEmailAddress());
        $this->assertInstanceOf(
            Email::class,
            $student->getEmailAddress());
    }

    public function testMustEnsureStudentHasCpf(){
        $student = Student::withEmailCpfName(
            "anyemail@mail.com",
            "123.456.789-09",
            "Any name");

        $this->assertSame(
            "123.456.789-09",
            (string) $student->getCpf());

        $this->assertInstanceOf(
            Cpf::class,
            $student->getCpf());
    }

    public function testMustEnsureThatTheCpfIsNotValid(){
        $this->expectException(InvalidCpfException::class);
        Student::withEmailCpfName(
            "anyemail@mail.com",
            "11.22.33-01",
            "Any name");
    }

    public function testMustEnsureThatTheEmailIsNotValid(){
        $this->expectException(InvalidEmailException::class);
        Student::withEmailCpfName(
            "anyinvalidemailaddress",
            "11.22.33-01",
            "Any name");
    }

    public function testMustEnsureStudentHasAnPhone(){
        $student = Student::withEmailCpfName(
            "anyemail@mail.com",
            "123.456.789-09",
            "Any name")
            ->addPhone("49","988776543");
        $resultGetPhone = $student->getPhone();


        $this->assertSame("(49) 988776543", (string) $resultGetPhone);
        $this->assertInstanceOf(Phone::class, $student->getPhone());
        $this->assertInstanceOf(Student::class, $student);
    }

    public function testMustEnsureStudentHasAnPhones(){
        $student = Student::withEmailCpfName(
            "anyemail@mail.com",
            "123.456.789-09",
            "Any name")
            ->addPhone("49","988776543")
            ->addPhone("49","99999999");

        $phones = $student->getPhones();

        $this->assertSame("(49) 988776543", (string) $phones[0]);
        $this->assertSame("(49) 99999999", (string) $phones[1]);
    }

    public function testMustEnsureThatThePhoneIsNotValid(){
        $this->expectException(InvalidPhoneException::class);
        Student::withEmailCpfName(
            "anyemail@mail.com",
            "123.456.789-09",
            "Any name")
            ->addPhone("9","988776");
    }

    public function testMustEnsureStudentHasAnAddress() {
        $student = Student::WithEmailCpfName(
                "anyemail@mail.com",
                "123.456.789-09",
                "Any name")
            ->setAddress(
                "Any street",
                123,
                "Any neighborhood",
                "Any City",
                "UF",
                "Any Compl");

        $this->assertInstanceOf(Student::class, $student);
        $this->assertInstanceOf(Address::class, $student->getAddress() );
        $this->assertSame("Any street", $student->getAddress()->getStreet());
        $this->assertSame("Any neighborhood", $student->getAddress()->getNeighborhood());
        $this->assertSame("Any City", $student->getAddress()->getCity());
        $this->assertSame("UF", $student->getAddress()->getState());
        $this->assertSame("Any Compl", $student->getAddress()->getCompl());
    }

    public function testMustEnsureStudentRepresentationWithString()
    {
        $student = Student::WithEmailCpfName(
            "anyemail@mail.com",
            "123.456.789-09",
            "Any name")
            ->setAddress(
                "Any street",
                123,
                "Any neighborhood",
                "Any City",
                "UF",
                "Any Compl")
            ->addPhone("49", "988240471")
            ->addPhone("49", "99999999")
            ->addPhone("11", "778855449");
        $this->assertIsString((string) $student);

        $this->assertStringContainsString('anyemail@mail.com',(string) $student);
        $this->assertStringContainsString('123.456.789-09',(string) $student);
        $this->assertStringContainsString('Any name',(string) $student);


        $this->assertStringContainsString('Any street',(string) $student);
        $this->assertStringContainsString('Number: 123',(string) $student);
        $this->assertStringContainsString('Any neighborhood',(string) $student);
        $this->assertStringContainsString('Any City',(string) $student);
        $this->assertStringContainsString('Any Compl',(string) $student);
        $this->assertStringContainsString('UF',(string) $student);


        $this->assertStringContainsString('(49) 988240471',(string) $student);
        $this->assertStringContainsString('(49) 99999999',(string) $student);
    }

}
