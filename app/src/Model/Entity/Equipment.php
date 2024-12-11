<?php

namespace App\Model\Entity;

use Symplefony\Model\Entity;

class Equipment extends Entity
{
    protected int $id;
    protected string $label;

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

    // Getter et Setter pour le label
    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;
        return $this;
    }
}
