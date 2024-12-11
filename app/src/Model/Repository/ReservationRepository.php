<?php

namespace App\Model\Repository;

use Symplefony\Database;
use Symplefony\Model\Repository;
use App\Model\Entity\Reservation;

class ReservationRepository extends Repository
{
    protected function getTableName(): string
    {
        return 'reservations';
    }

    //creation du crud
    public function create(ReservationRepository $reservation): ?ReservationRepository
    {

        $query = sprintf(
            'INSERT INTO `%s` 
                (`date_start`, `date_end`, `user_id`, `announcement_id`) 
                VALUES (:date_start, :date_end, :user_id, :announcement_id,)',
            $this->getTableName()
        );

        $sth = $this->pdo->prepare($query);
        //si la preparation echoue
        if (! $sth) {
            return null;
        }

        $success = $sth->execute([
            'date_start' => $reservation->getDateStart(),
            'date_end' => $reservation->getDateEnd(),
            'user_id' => $reservation->getId(),
            'announcement_id' => $reservation->getAnnouncementId()
        ]);

        //si echec de l'insertion
        if (! $success) {
            return null;
        }

        //ajout de l'id de l'item cree en base de donnees
        $reservation->setId($this->pdo->lastInsertId());
        return $reservation;
    }

    //cRud: read tous les items
    public function getAll(): array
    {
        return $this->readAll(ReservationRepository::class);
    }

    //cRud: read un item par son id
    public function getById(int $id): ?ReservationRepository
    {
        return $this->readById(ReservationRepository::class, $id);
    }

    //crUd: update
    public function update(ReservationRepository $reservation): ?ReservationRepository
    {
        $query = sprintf(
            'UPDATE `%s` 
                SET
                    `date_start`=:date_start,
                    `date_end`=:date_end,
                    `user_id`=:user_id,
                    `announcement_id`=:announcement_id,
                WHERE id=:id',
            $this->getTableName()
        );

        $sth = $this->pdo->prepare($query);
        //si la preparation echoue
        if (! $sth) {
            return null;
        }

        $success = $sth->execute([

            'id' => $reservation->getId(),
            'date_start' => $reservation->getDateStart(),
            'date_end' => $reservation->getDateEnd(),
            'user_id' => $reservation->getUserId(),
            'announcement_id' => $reservation->getAnnouncementId(),
            
        ]);

        //si echec de la maj
        if (! $success) {
            return null;
        }

        return $reservation;
    }

}