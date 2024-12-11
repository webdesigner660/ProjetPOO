<?php 

namespace App\Controller;

use App\Model\Repository\RepoManager;
use Symplefony\Controller;
use Symplefony\View;

class LoginController extends Controller{

public function login(): void
{
    $view = new View('page:login');
    $data = [
        'title' => 'Connexion - MoinCherBnb.com'
    ];
    $view->render($data);
}

}