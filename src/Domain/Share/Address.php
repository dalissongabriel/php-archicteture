<?php


namespace Alura\Architecture\Domain\Share;


class Address
{
    private string $neighborhood;
    private string $compl;
    private string $city;
    private string $state;
    private string $number;
    private string $street;

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return Address
     */
    public function setStreet(string $street): Address
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string
     */
    public function getNeighborhood(): string
    {
        return $this->neighborhood;
    }

    /**
     * @param string $neighborhood
     * @return Address
     */
    public function setNeighborhood(string $neighborhood): Address
    {
        $this->neighborhood = $neighborhood;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompl(): string
    {
        return $this->compl;
    }

    /**
     * @param string $compl
     * @return Address
     */
    public function setCompl(string $compl): Address
    {
        $this->compl = $compl;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Address
     */
    public function setCity(string $city): Address
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return Address
     */
    public function setState(string $state): Address
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return Address
     */
    public function setNumber(string $number): Address
    {
        $this->number = $number;
        return $this;
    }



}