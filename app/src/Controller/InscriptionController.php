<?php

namespace App\Controller;

use App\Session;
use Symplefony\View;
use App\Model\Entity\User;
use Symplefony\Controller;
use Laminas\Diactoros\ServerRequest;
use App\Model\Repository\RepoManager;

class InscriptionController extends Controller
{
    public function Inscription(): void
    {
        $view = new View('page:inscription');

        $data = [
            'title' => 'inscription'
        ];

        $view->render($data);
    }

    /* Crud: Create */
    public function create(ServerRequest $request): void
    {
        $user_data = $request->getParsedBody();

        $user = new User($user_data);

        $user_created = RepoManager::getRM()->getUserRepo()->create($user);

        if (is_null($user_created)) {
            // TODO: gérer une erreur
            $this->redirect('/users/add');
        }

        // On enregistre l'utilisateur correspondant dans la session
        Session::set(Session::USER, $user);

        if ($user->getRole() === 1) {
            $this->redirect('/home/user');
        }

        if ($user->getRole() === 2) {
            $this->redirect('/home/owner');
        }
    

    }
}
