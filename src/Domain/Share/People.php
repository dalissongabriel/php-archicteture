<?php


namespace Alura\Architecture\Domain\Share;

abstract class People
{
    protected Cpf $cpf;
    protected string $name;
    protected Email $email;
    protected array $phones;
    private Address $address;

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

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setEmailAddress(string $address): self
    {
        $this->email = new Email($address);
        return $this;
    }

    public function getEmailAddress(): Email
    {
        return $this->email;
    }

    public function setCpf(string $cpf): self
    {
        $this->cpf = new Cpf($cpf);
        return $this;
    }

    public function getCpf(): Cpf
    {
        return $this->cpf;

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

}