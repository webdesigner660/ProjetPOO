<?php

namespace App\Model\Repository;

use App\Model\Entity;
use Symplefony\Model\Repository;
use App\Model\Entity\AnnouncementEquipment;
use App\Model\Repository\AnnouncementRepository;

class AnnouncementEquipment extends Repository
{
    protected function getTableName(): string
    {
        return 'announcement_equipment';
    }
    /* Crud: Create */
    public function create(AnnouncementEquipment $announcement_equipment): ?AnnouncementEquipment
    {
        $query = sprintf(
            'INSERT INTO `%s` 
                (`id_announcement`,`id_equipment`) 
                VALUES (:id_announcement,:id_equipment)',
            $this->getTableName()
        );
        $sth = $this->pdo->prepare($query);
        // Si la préparation échoue
        if (! $sth) {
            return null;
        }
        $success = $sth->execute([
            'id_announcement' => $announcement_equipment->getAnnouncementId(),
            'id_equipment' => $announcement_equipment->getEquipmentId()
        ]);
        // Si echec de l'insertion
        if (! $success) {
            return null;
        }
        // Ajout de l'id de l'item créé en base de données
        $announcement_equipment->setId($this->pdo->lastInsertId());
        return $announcement_equipment;
    }
    /* cRud: Read tous les items */
    public function getAll(): array
    {
        return $this->readAll(AnnouncementEquipment::class);
    }
    /* cRud: Read un item par son id */
    public function getById(int $id): ?AnnouncementEquipment
    {
        return $this->readById(AnnouncementEquipment::class, $id);
    }
    /* crUd: Update */
    public function update(AnnouncementEquipment $announcement_equipment): ?AnnouncementEquipment
    {
        $query = sprintf(
            'UPDATE `%s` 
                SET
                    `id_announcement`=:id_announcement,
                    `id_equipment`=:id_equipment
                WHERE id=:id',
            $this->getTableName()
        );
        $sth = $this->pdo->prepare($query);
        // Si la préparation échoue
        if (! $sth) {
            return null;
        }
        $success = $sth->execute([
            'id_announcement' => $announcement_equipment->getAnnouncementId(),
            'id_equipment' => $announcement_equipment->getEquipmentId(),
            'id' => $announcement_equipment->getId()
        ]);
        // Si echec de la mise à jour
        if (! $success) {
            return null;
        }
        return $announcement_equipment;
    }
}
