<?php

namespace App\Model\Repository;

use App\Model\Entity\Equipment;
use MiladRahimi\PhpRouter\Routing\Repository;

class EquipmentRepository extends Repository
{
    protected function getTableName(): string
    {
        return 'equipments';
    }

    /* Crud: Create */
    public function create(Equipment $equipment): ?Equipment
    {
        $query = sprintf(
            'INSERT INTO `%s` 
                (`label`) 
                VALUES (:label)',
            $this->getTableName()
        );
        $sth = $this->pdo->prepare($query);
        // Si la préparation échoue
        if (! $sth) {
            return null;
        }
        $success = $sth->execute([
            'label' => $label->getLabel(),
        ]);
        // Si echec de l'insertion
        if (! $success) {
            return null;
        }
        // Ajout de l'id de l'item créé en base de données
        $equipment->setId($this->pdo->lastInsertId());
        return $equipment;
    }
    /* cRud: Read tous les items */
    public function getAll(): array
    {
        return $this->readAll(Equipment::class);
    }
    /* cRud: Read un item par son id */
    public function getById(int $id): ?Equipment
    {
        return $this->readById(Equipment::class, $id);
    }
    /* crUd: Update */
    public function update(Equipment $equipment): ?Equipment
    {
        $query = sprintf(
            'UPDATE `%s` 
                SET
                    `label`=:label,
                WHERE id=:id',
            $this->getTableName()
        );
        $sth = $this->pdo->prepare($query);
        // Si la préparation échoue
        if (! $sth) {
            return null;
        }
        $success = $sth->execute([
            'label' => $equipment->getLabel(),
        ]);
        // Si echec de la mise à jour
        if (! $success) {
            return null;
        }
        return $equipment;
    }
}
