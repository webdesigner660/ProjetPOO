<?php

namespace App\Model\Repository;

use App\Model\Entity\TypeAccommodation;
use Symplefony\Model\Repository;

class TypeAccommodationRepository extends Repository
{
    protected function getTableName(): string
    {
        return 'TypeAccommodation';
    }

    /* Crud: Create */
    public function create(TypeAccommodation $type_accommodation): ?TypeAccommodation
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
        $type_accommodation->setId($this->pdo->lastInsertId());
        return $type_accommodation;
    }
    /* cRud: Read tous les items */
    public function getAll(): array
    {
        return $this->readAll(TypeAccommodation::class);
    }
    /* cRud: Read un item par son id */
    public function getById(int $id): ?TypeAccommodation
    {
        return $this->readById(TypeAccommodation::class, $id);
    }
    /* crUd: Update */
    public function update(TypeAccommodation $type_accommodation): ?TypeAccommodation
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
            'label' => $type_accommodation->getLabel(),
        ]);
        // Si echec de la mise à jour
        if (! $success) {
            return null;
        }
        return $type_accommodation;
        }
}
