<?php


namespace Alura\Tests;


use Alura\Architecture\Domain\College\College;


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

    public function testMustEnsureCollegeHasPhone()
    {
        $college = College::withSocialReasonFantasyNameAndEmail(
            "Alura Cursos Tecnologia Ltda",
            "Alura",
            "alura@alura.com.br")
            ->addPhone("49","35529988");
        $resultGetPhone = $college->getPhone();


        $this->assertSame("(49) 35529988", (string) $resultGetPhone);
        $this->assertInstanceOf(Phone::class, $college->getPhone());
        $this->assertInstanceOf(College::class, $college);
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

    public function testMustEnsureThatThePhoneIsNotValid(){
        $this->expectException(InvalidPhoneException::class);
        College::withSocialReasonFantasyNameAndEmail(
            "Alura Cursos Tecnologia Ltda",
            "Alura",
            "alura@alura.com.brd")
            ->addPhone("9","988776");
    }
}