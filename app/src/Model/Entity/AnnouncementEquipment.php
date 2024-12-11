<?php

namespace App\Model\Entity;

use Symplefony\Model\Entity;

class AnnouncementEquipment extends Entity
{
    private int $id;
    private int $announcementId;
    private int $equipmentId;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getAnnouncementId(): int
    {
        return $this->announcementId;
    }

    public function setAnnouncementId(int $announcementId): self
    {
        $this->announcementId = $announcementId;
        return $this;
    }

    public function getEquipmentId(): int
    {
        return $this->equipmentId;
    }

    public function setEquipmentId(int $equipmentId): self
    {
        $this->equipmentId = $equipmentId;
        return $this;
    }
}
