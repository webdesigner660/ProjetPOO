<?php 

namespace App\Controller;

use App\Model\Repository\RepoManager;
use Symplefony\Controller;
use Symplefony\View;

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



}