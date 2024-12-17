<?php

namespace App\Model\Entity;

use App\Model\Repository\RepoManager;
use Symplefony\Model\Entity;

class Announcement extends Entity
{
    protected int $id;
    protected int $id_owner;
    protected int $id_adress;
    protected float $size;
    protected float $price;
    protected int $equipment_id;
    protected int $accommodation_id;
    protected $title;
    protected string $description;
    protected int $sleeping;
    protected Adress $adress;
    protected TypeAccommodation $typeAccommodation;

    // Getter et Setter pour l'ID
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    // Getter et Setter pour id_owner
    public function getIdOwner(): int
    {
        return $this->id_owner;
    }

    public function setIdOwner(int $id_owner): self
    {
        $this->id_owner = $id_owner;
        return $this;
    }

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

    // Getter et Setter pour size
    public function getSize(): float
    {
        return $this->size;
    }

    public function setSize(float $size): self
    {
        $this->size = $size;
        return $this;
    }

    // Getter et Setter pour price
    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    // Getter et Setter pour description
    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    // Getter et Setter pour sleeping
    public function getSleeping(): int
    {
        return $this->sleeping;
    }

    public function setSleeping(int $sleeping): self
    {
        $this->sleeping = $sleeping;
        return $this;
    }

    // Getter et Setter pour equipment_id
    public function getEquipmentId(): int
    {
        return $this->equipment_id;
    }

    public function setEquipmentId(int $equipment_id): self
    {
        $this->equipment_id = $equipment_id;
        return $this;
    }

    // Getter et Setter pour accommodation_id
    public function getAccommodationId(): int
    {
        return $this->accommodation_id;
    }

    public function setAccommodationId(int $accommodation_id): self
    {
        $this->accommodation_id = $accommodation_id;
        return $this;
    }


    public function getTitle()
    {
        return $this->title;
    }


    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getAdress(): Adress
    {
        return $this->adress;
    }
    public function setAdress(Adress $adress): self
    {
        $this->adress = $adress;
        return $this;
    }


    public function getTypeAccommodation() : TypeAccommodation
    {
        return $this->typeAccommodation;
    }


    public function setTypeAccommodation( TypeAccommodation $typeAccommodation)
    {
        $this->typeAccommodation = $typeAccommodation;

        return $this;
    }
}
