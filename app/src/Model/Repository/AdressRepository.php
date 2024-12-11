<?php

namespace App\Model\Repository;

use App\Model\Entity\Adress;
use Symplefony\Model\Repository;

class AdressRepository extends Repository
{
    protected function getTableName(): string
    {
        return 'Adress';
    }
    /* Crud: Create */
    public function create(Adress $adress): ?Adress
    {
        $query = sprintf(
            'INSERT INTO `%s` 
                (`city`,`country`) 
                VALUES (:city,:country)',
            $this->getTableName()
        );
        $sth = $this->pdo->prepare($query);
        // Si la préparation échoue
        if (! $sth) {
            return null;
        }
        $success = $sth->execute([
            'city' => $adress->getCity(),
            'country' => $adress->getCountry()
        ]);
        // Si echec de l'insertion
        if (! $success) {
            return null;
        }
        // Ajout de l'id de l'item créé en base de données
        $adress->setId($this->pdo->lastInsertId());
        return $adress;
    }
    /* cRud: Read tous les items */
    public function getAll(): array
    {
        return $this->readAll(Adress::class);
    }
    /* cRud: Read un item par son id */
    public function getById(int $id): ?Adress
    {
        return $this->readById(Adress::class, $id);
    }
    /* crUd: Update */
    public function update(Adress $adress): ?Adress
    {
        $query = sprintf(
            'UPDATE `%s` 
                SET
                    `city`=:city,
                    `country`=:country
                WHERE id=:id',
            $this->getTableName()
        );
        $sth = $this->pdo->prepare($query);
        // Si la préparation échoue
        if (! $sth) {
            return null;
        }
        $success = $sth->execute([
            'city' => $adress->getCity(),
            'country' => $adress->getCountry(),
            'id' => $adress->getId()
        ]);
        // Si echec de la mise à jour
        if (! $success) {
            return null;
        }
        return $adress;
    }
}
