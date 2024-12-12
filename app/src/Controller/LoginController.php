<?php

namespace App\Controller;

use App\App;
use App\Model\Entity\User;
use Symplefony\View;
use Symplefony\Controller;
use Laminas\Diactoros\ServerRequest;
use App\Model\Repository\RepoManager;
use App\Session;

class LoginController extends Controller
{

    public function login(): void
    {
        $view = new View('page:login');
        $data = [
            'title' => 'Connexion - MoinCherBnb.com'
        ];
        $view->render($data);
    }

    public function account(): void
    {
        $view = new View('page:account');
        $data = [
            'title' => 'Votre Compte - MoinsCherBnb.com' ];
            $view->render($data);
    }

    public function checkCredentials(ServerRequest $request): void
    {
        $form_data = $request->getParsedBody();

        // Si les données du formulaire sont vides ou inexistantes
        if (empty($form_data['email']) || empty($form_data['password'])) {
            // TODO: gérer une erreur
            $this->redirect('/connexion');
        }

        // On nettoie les espaces en trop
        $email = trim($form_data['email']);
        $password = trim($form_data['password']);

        // Si les données sont vides après nettoyage
        if (empty($email) || empty($password)) {
            // TODO: gérer une erreur
            $this->redirect('/connexion');
        }


        // On vérifie les identifiants de connexion
        $user = RepoManager::getRM()->getUserRepo()->checkAuth($email, $password);

        // Si échec
        if (is_null($user)) {
            // TODO: gérer une erreur
            $this->redirect('/connexion');
        }

        // On enregistre l'utilisateur correspondant dans la session
        Session::set(Session::USER, $user);

        if($user->getRole() === 1) {
            $this->redirect('/home/user');
        }

        if($user->getRole() === 2) {
            $this->redirect('/home/owner');
        }


}

}
