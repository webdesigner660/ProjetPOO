<?php

namespace App\Model\Entity;

use Symplefony\Model\Entity;

class Adress extends Entity
{
    protected int $id_adress;
    protected string $city;
    protected string $country;
    protected string $street;

    // Getter et Setter pour id_adress
    public function getIdAdress(): int
    {
        return $this->id_adress;
    }

    public function setIdAdress(int $id_adress): self
    {
        $this->id_adress = $id_adress;
        return $this;
    }

    // Getter et Setter pour city
    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    // Getter et Setter pour country
    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;
        return $this;
    }

    // Getter et Setter pour street
    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;
        return $this;
    }
}
