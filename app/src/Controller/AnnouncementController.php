<?php


namespace App\Controller;

use App\Model\Repository\AnnouncementRepository;
use App\Model\Repository\RepoManager;
use Symplefony\Controller;
use Symplefony\View;

class AnnouncementController extends Controller
{
    /**
     * Méthode pour afficher les détails d'une annonce spécifique
     */
    public function details(int $id): void
    {

        $view = new View('page:announcement:details');
        // Récupérer l'instance du Repository
        $announcement = RepoManager::getRM()->getAnnouncementRepo()->getById($id);

        $data = [
            'announcement' => $announcement

        ];

        $view->render($data);

    }

}
