<?php


namespace Alura\Tests;


use Alura\Architecture\Domain\College\College;

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
}