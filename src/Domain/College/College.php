<?php

namespace Alura\Architecture\Domain\College;

use Alura\Architecture\Domain\Share\Address;
use Alura\Architecture\Domain\Share\Email;

class College
{
    private string $socialReason;
    private string $fantasyName;
    private Email $email;
    private Address $address;
    private array $phones;

    /**
     * College constructor.
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
        return $college;
    }
    /**
     * @return string
     */
    public function getSocialReason(): string
    {
        return $this->socialReason;
    }

    /**
     * @param string $socialReason
     * @return College
     */
    public function setSocialReason(string $socialReason): College
    {
        $this->socialReason = $socialReason;
        return $this;
    }

    /**
     * @return string
     */
    public function getFantasyName(): string
    {
        return $this->fantasyName;
    }

    /**
     * @param string $fantasyName
     * @return College
     */
    public function setFantasyName(string $fantasyName): College
    {
        $this->fantasyName = $fantasyName;
        return $this;
    }

    /**
     * @return Email
     */
    public function getEmailAddress(): Email
    {
        return $this->email;
    }


}