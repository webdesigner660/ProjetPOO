<?php

namespace App\Controller;

use App\Model\Repository\RepoManager;
use PDO;

use Symplefony\Controller;
use Symplefony\Database;
use Symplefony\View;

use App\Model\UserModel;
use App\Session;

class PageController extends Controller
{
    // Page d'accueil
    public function index(): void
    {
        $view = new View('page:home');
        $appartements = RepoManager::getRM()->getAnnouncementRepo()->getAll();
        // var_dump($appartements);
        // die();
        $data = [
            'title' => 'Accueil - MoinCherBnb.com',
            'appartements' => $appartements

        ];

        $view->render($data);
    }

    public function indexOwner(): void
    {
        $view = new View('page:owner');
        $data = [
            'title' => 'Propriétaire - MoinCherBnb.com'
        ];
        $view->render($data);
        var_dump(RepoManager::getRM()->getAnnouncementRepo()->getAllForOwner(Session::get(Session::USER)->getId()));
    }

    public function indexUser(): void
    {
        $view = new View('page:user');
        $data = [
            'title' => 'Utilisateur - MoinCherBnb.com'
        ];
        $view->render($data);
    }
}
