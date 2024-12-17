<?php 

namespace App\Controller;

use Symplefony\View;
use Symplefony\Controller;
use App\Controller\AuthController;
use App\Model\Repository\RepoManager;

class ReservationController extends Controller
{
    public function reservation(int $id): void
    {
        $view = new View('page:reservation');
        $reservation = RepoManager::getRM()->getAnnouncementRepo()->getById($id);

        $data = [
            'reservation' => $reservation
            
        ];
        

        $view->render($data);


    }

    public function CheckAuthReservation(): void
    {
    if (AuthController::isAuth()) {
        $this->redirect('/reservation/{id}');
    } else {
        $this->redirect('/login');
    };



}

}