<?php

namespace Alura\Tests;

use Alura\Architecture\Domain\College\College;

use Alura\Architecture\Domain\Share\Address;
use Alura\Architecture\Domain\Share\Phone;
use Alura\Architecture\Utils\Exceptions\InvalidEmailException;
use Alura\Architecture\Utils\Exceptions\InvalidPhoneException;

use PHPUnit\Framework\TestCase;

class CollegeTest extends TestCase
{
    public function testMustEnsureCollegeHasAnEmail()
    {
        $college = College::withSocialReasonFantasyNameAndEmail(
            "Alura Cursos Tecnologia Ltda",
            "Alura",
            "alura@alura.com.br"
        );
        $this->assertInstanceOf(College::class,$college);
        $this->assertSame("Alura Cursos Tecnologia Ltda",$college->getSocialReason());
        $this->assertSame("Alura",$college->getFantasyName());
        $this->assertSame("alura@alura.com.br",(string) $college->getEmailAddress());
    }

    public function testMustEnsureThatTheEmailIsNotValid(){
        $this->expectException(InvalidEmailException::class);
        College::withSocialReasonFantasyNameAndEmail(
            "Alura Cursos Tecnologia Ltda",
            "Alura",
            "alura@"
        );
    }

    public function testMustEnsureCollegeHasPhone()
    {
        $college = College::withSocialReasonFantasyNameAndEmail(
            "Alura Cursos Tecnologia Ltda",
            "Alura",
            "alura@alura.com.br")
            ->addPhone("49","35529988")
            ->addPhone("49","35529988");
        ;
        $resultGetPhone = $college->getPhone();


        $this->assertSame("(49) 35529988", (string) $resultGetPhone);
        $this->assertInstanceOf(Phone::class, $college->getPhone());
        $this->assertInstanceOf(College::class, $college);
    }

    public function testMustEnsureCollegeHasAnPhones(){
        $college = College::withSocialReasonFantasyNameAndEmail(
            "Alura Cursos Tecnologia Ltda",
            "Alura",
            "alura@alura.com.br")
            ->addPhone("49","988776543")
            ->addPhone("49","99999999");

        $phones = $college->getPhones();

        $this->assertSame("(49) 988776543", (string) $phones[0]);
        $this->assertSame("(49) 99999999", (string) $phones[1]);
    }

    public function testMustEnsureThatThePhoneIsNotValid(){
        $this->expectException(InvalidPhoneException::class);
        College::withSocialReasonFantasyNameAndEmail(
            "Alura Cursos Tecnologia Ltda",
            "Alura",
            "alura@alura.com.br")
            ->addPhone("9","988776");
    }


    public function testMustEnsureThatTheCpfIsNotValid()
    {
        $this->expectException(InvalidEmailException::class);
        College::withSocialReasonFantasyNameAndEmail(
            "Alura Cursos Tecnologia Ltda",
            "Alura",
            "alura"
        );
    }

    public function testMustEnsureCollegeHasAnAddress() {
        $college =  College::withSocialReasonFantasyNameAndEmail(
            "Alura Cursos Tecnologia Ltda",
            "Alura",
            "alura@alura.com.br")
            ->setAddress(
                "Any street",
                123,
                "Any neighborhood",
                "Any City",
                "UF",
                "Any Compl");

        $this->assertInstanceOf(College::class, $college);
        $this->assertInstanceOf(Address::class, $college->getAddress() );
        $this->assertSame("Any street", $college->getAddress()->getStreet());
        $this->assertSame("Any neighborhood", $college->getAddress()->getNeighborhood());
        $this->assertSame("Any City", $college->getAddress()->getCity());
        $this->assertSame("UF", $college->getAddress()->getState());
        $this->assertSame("Any Compl", $college->getAddress()->getCompl());
    }
}