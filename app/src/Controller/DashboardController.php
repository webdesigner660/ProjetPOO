<?php 

namespace App\Controller;

use Symplefony\Controller;
use Symplefony\View;

class Dashboard extends Controller
{
    public function account()
    {
        $view = new View('page:account');


        $data = [

            'title' => 'Bienvenue sur votre compte ! '

        ];

        $view->render($data);

    }
}