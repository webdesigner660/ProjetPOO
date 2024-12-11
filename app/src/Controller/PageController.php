<?php

namespace App\Controller;

use App\Model\Repository\RepoManager;
use PDO;

use Symplefony\Controller;
use Symplefony\Database;
use Symplefony\View;

use App\Model\UserModel;

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
            'appartements'=>$appartements
            
        ];

        $view->render($data);
    }
}
