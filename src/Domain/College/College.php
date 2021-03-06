<?php

namespace Alura\Architecture\Domain\College;

use Alura\Architecture\Domain\Course\Course;
use Alura\Architecture\Domain\Share\Address;
use Alura\Architecture\Domain\Share\Email;
use Alura\Architecture\Domain\Share\Phone;

class College
{
    private string $socialReason;
    private string $fantasyName;
    private Email $email;
    private Address $address;
    private array $phones;
    private array $courses;

    /**
     * College named constructor.
     * @param string $socialReason
     * @param string $fantasyName
     * @param string $email
     */
    public static function withSocialReasonFantasyNameAndEmail(string $socialReason, string $fantasyName, string $email): self
    {
        $college = new College();
        $college->email = new Email($email);
        $college->socialReason = $socialReason;
        $college->fantasyName = $fantasyName;
        $college->phones = [];
        return $college;
    }

    public function getSocialReason(): string
    {
        return $this->socialReason;
    }

    public function getFantasyName(): string
    {
        return $this->fantasyName;
    }

    public function getEmailAddress(): Email
    {
        return $this->email;
    }

    public function addPhone($ddd, $number): self
    {
        $this->phones[] = new Phone($ddd,$number);
        return $this;
    }

    public function getPhone(): Phone
    {
        return $this->phones[0];
    }

    public function getPhones(): array
    {
        return $this->phones;
    }

    /**
     * @param string $street
     * @param int $number
     * @param string $neighborhood
     * @param string $city
     * @param string $state
     * @param string|null $compl
     */
    public function setAddress(string $street, int $number, string $neighborhood, string $city, string $state, string $compl = null): self
    {
        $this->address = new Address();
        $this->address->setStreet($street);
        $this->address->setNeighborhood($neighborhood);
        $this->address->setCity($city);
        $this->address->setState($state);
        $this->address->setNumber($number);
        if( $compl !== null ) {
            $this->address->setCompl($compl);
        }
        return $this;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function __toString()
    {
        $phoneList = "";
        if($this->phones) {
            $phoneList = "Phones: " . PHP_EOL;
            /**
             * Phone $phone
             */
            foreach($this->phones as $phone) {
                $phoneList .=  "\t" . (string) $phone . PHP_EOL;
            }
        }

        return "College" .PHP_EOL.
            "\tFantasy name: $this->fantasyName" . PHP_EOL .
            "\tSocial Reason: $this->socialReason" . PHP_EOL .
            "\tE-mail: $this->email " . PHP_EOL .
            (string) $this->getAddress() . PHP_EOL .
            $phoneList;

    }

    public function addCourse(Course $course): self
    {
        $this->courses[] = $course;
        return $this;
    }

    public function getCourses(): array
    {
        return $this->courses;
    }
}