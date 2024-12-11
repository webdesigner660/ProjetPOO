<?php

namespace App\Model\Repository;

use Symplefony\Database;
use App\Model\Repository\UserRepository;
use App\Model\Repository\AdressRepository;
use Symplefony\Model\RepositoryManagerTrait;
use App\Model\Repository\EquipmentRepository;
use App\Model\Repository\ReservationRepository;
use App\Model\Repository\AnnouncementRepository;
use App\Model\Repository\TypeAccommodationRepository;

class RepoManager
{
    use RepositoryManagerTrait;

     private UserRepository $user_repository;
     public function getUserRepo(): UserRepository
     {
         return $this->user_repository;
     }

     private AdressRepository $adress_repository;
     public function getAdressRepo(): AdressRepository
     {
         return $this->adress_repository;
     }

     private AnnouncementRepository $announcement_repository;
        public function getAnnouncementRepo(): AnnouncementRepository
        {
            return $this->announcement_repository;
        }

        private EquipmentRepository $equipment_repository;
        public function getEquipmentRepo(): EquipmentRepository
        {
            return $this->equipment_repository;
        }

        private ReservationRepository $Reservation_repository;
        public function getReservationRepo(): ReservationRepository
        {
            return $this->Reservation_repository;
        }

        private TypeAccommodationRepository $type_accommodation_repository;
        public function getTypeAccommodationRepo(): TypeAccommodationRepository
        {
            return $this->type_accommodation_repository;
        }


    

    private function __construct()
    {
        $pdo = Database::getPDO();

        $this->user_repository = new UserRepository($pdo);
        $this->adress_repository = new AdressRepository($pdo);
        $this->announcement_repository = new AnnouncementRepository($pdo);
        $this->equipment_repository = new EquipmentRepository($pdo);
        $this->Reservation_repository = new ReservationRepository($pdo);
        $this->type_accommodation_repository = new TypeAccommodationRepository($pdo);
        

        
    }
}
