<?php

namespace App\Model\Entity;

use Symplefony\Model\Entity;

class Reservation extends Entity
{
    protected int $id;
    protected string $date_start;
    protected string $date_end;
    protected int $user_id;
    protected string $announcement_id;

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

    // Getter et Setter pour la date de début
    public function getDateStart(): string
    {
        return $this->date_start;
    }

    public function setDateStart(string $date_start): self
    {
        $this->date_start = $date_start;
        return $this;
    }

    // Getter et Setter pour la date de fin
    public function getDateEnd(): string
    {
        return $this->date_end;
    }

    public function setDateEnd(string $date_end): self
    {
        $this->date_end = $date_end;
        return $this;
    }

    // Getter et Setter pour user_id
    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    // Getter et Setter pour announcement_id
    public function getAnnouncementId(): string
    {
        return $this->announcement_id;
    }

    public function setAnnouncementId(string $announcement_id): self
    {
        $this->announcement_id = $announcement_id;
        return $this;
    }
}
