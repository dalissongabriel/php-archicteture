<?php

namespace Alura\Tests;

use Alura\Architecture\Student;
use PHPUnit\Framework\TestCase;

class StudentTest extends TestCase
{
    public function testMustEnsureStudentHasEmailAddress(){
        $student = new Student();
        $student->setEmailAddress("anyemail@mail.com");
        $this->assertSame("anyemail@mail.com", (string) $student->getEmailAddress());
    }

    public function testMustEnsureStudentHasCpf(){
        $student = new Student();
        $student->setCpf("123.456.789-09");
        $this->assertSame("123.456.789-09", (string) $student->getCpf());
    }
}
