<?php

namespace App\Model\Repository;

use Symplefony\Database;
use App\Model\Entity\User;
use Symplefony\Model\Repository;
use App\Model\Repository\RepoManager;


class UserRepository extends Repository
{

    protected function getTableName(): string
    {
        return 'user';
    }
    //creation du CRUD :

    public function create($user)
    {
        $query = sprintf(
            'INSERT INTO`%s`(`email`,`password`,`firstname`,`lastname`,`phone`,`role`)
        VALUES(:email_user,:password,:firstname,:lastname,:phone,:role)',
            self::getTableName()
        );
        $sth = Database::getPDO()->prepare($query);
        if (!$sth) {
            return null;
        }

        $success = $sth->execute([
            'email_user' => $user->getEmail(),
            'password' => $user->getPassword(),
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname(),
            'phone' => $user->getPhone(),
            'role' => $user->getRole(),

        ]);

        if (!$success) {
            return null;
        }

        // Ajout de l'id de l'item créé en base de données
        $user->setId($this->pdo->lastInsertId());

        return $user;
    }

    /* cRud: Read tous les items */
    public function getAll(): array
    {
        return $this->readAll(User::class);
    }

    /* cRud: Read un item par son id */
    public function getById(int $id): ?User
    {
        return $this->readById(User::class, $id);
    }
    /* crUd: Update */
    public function update(User $user): ?User
    {
        $query = sprintf(
            'UPDATE `%s` 
                SET
                    `email`=:email_user,
                    `password`=:password,
                    `firstname`=:firstname,
                    `lastname`=:lastname,
                    `phone_number`=:phone,
                    `role`=:role,
                WHERE id=:id',
            $this->getTableName()
        );
        $sth = $this->pdo->prepare($query);
        // Si la préparation échoue
        if (! $sth) {
            return null;
        }
        $success = $sth->execute([
            'password' => $user->getPassword(),
            'email' => $user->getEmail(),
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname(),
            'phone_number' => $user->getPhone(),
            'id' => $user->getId()
        ]);
        // Si echec de la mise à jour
        if (! $success) {
            return null;
        }
        return $user;
    }
    /* cruD: Delete */
    public function deleteOne(int $id): bool
    {
        // On récupère l'user pour pouvoir connaîre son address_id 
        $user = $this->getById($id);
        if (is_null($user)) {
            return false;
        }
        $adressRepo = RepoManager::getRM()->getAdressRepo();
        // On récupère l'addresse
        $adress = $adressRepo->getById($user->getIdAdress());
        if (is_null($adress)) {
            return false;
        }
        // On supprime l'user
        $success = parent::deleteOne($id);
        // Si cela a fonctionné, on supprimé l'addresse liée
        if ($success) {
            $success = $adressRepo->deleteOne($adress->getId());
        }
        return $success;
    }

    public function checkAuth(string $email, string $password): ?User
    {
        $query = sprintf(
            'SELECT * FROM `%s` WHERE `email`=:email AND `password`=:password',
            $this->getTableName()
        );

        $sth = $this->pdo->prepare($query);

        if (! $sth) {
            return null;
        }

        $sth->execute(['email' => $email, 'password' => $password]);

        $user_data = $sth->fetch();

        if (! $user_data) {
            return null;
        }

        return new User($user_data);
    }

    
}