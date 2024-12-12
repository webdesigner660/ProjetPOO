<?php

/**
 * Classe de démarrage de l'application
 */

// Déclaration du namespace de ce fichier
namespace App;

use Exception;
use Throwable;

use Symplefony\View;
use MiladRahimi\PhpRouter\Router;
use App\Controller\AuthController;

use App\Controller\PageController;

use App\Controller\UserController;
use App\Controller\AdminController;
use App\Controller\LoginController;
use App\Middleware\AdminMiddleware;
use App\Controller\DashboardController;
use App\Controller\InscriptionController;
use App\Controller\ReservationController;
use App\Controller\AnnouncementController;
use MiladRahimi\PhpRouter\Routing\Attributes;
use MiladRahimi\PhpRouter\Exceptions\RouteNotFoundException;

final class App
{
    private static ?self $app_instance = null;

    // Le routeur de l'application
    private Router $router;
    public function getRouter(): Router
    {
        return $this->router;
    }

    public static function getApp(): self
    {
        // Si l'instance n'existe pas encore on la crée
        if (is_null(self::$app_instance)) {
            self::$app_instance = new self();
        }

        return self::$app_instance;
    }

    // Démarrage de l'application
    public function start(): void
    {
        $this->registerRoutes();
        $this->startRouter();
    }

    private function __construct()
    {
        // Création du routeur
        $this->router = Router::create();
    }

    // Enregistrement des routes de l'application
    private function registerRoutes(): void
    {
        // -- Formats des paramètres --
        // {id} doit être un nombre
        $this->router->pattern('id', '\d+');

        // -- Pages communes --
        $this->router->get('/', [PageController::class, 'index']);

        $this->router->get('/announcement/details/{id}', [AnnouncementController::class, 'details']);

        $this->router->get('/connexion', [LoginController::class, 'login']);
        $this->router->post('/connexion', [LoginController::class, 'checkCredentials'] );
        $this->router->get('/account',[LoginController::class, 'account']);
        $this->router->get('/inscription', [InscriptionController::class, 'inscription']);
        $this->router->post('/inscription', [InscriptionController::class, 'create']);
        $this->router->get('/reservation/{id}',[ReservationController::class, 'reservation']);
        
        
        

        // TODO: Groupe Visiteurs (non-connectés)

        // -- Pages d'admin --
        $adminAttributes = [
            Attributes::PREFIX => '/admin',
            Attributes::MIDDLEWARE => [AdminMiddleware::class]
        ];

        $this->router->group($adminAttributes, function (Router $router) {});
    }

    // Démarrage du routeur
    private function startRouter(): void
    {
        try {
            $this->router->dispatch();
        }
        // Page 404 avec status HTTP adequat pour les pages non listée dans le routeur
        catch (RouteNotFoundException $e) {
            View::renderError(404);
        }
        // Erreur 500 pour tout autre problème temporaire ou non
        catch (Throwable $e) {
            View::renderError(500);
            var_dump($e);
        }
    }

    private function __clone() {}
    public function __wakeup()
    {
        throw new Exception("Non c'est interdit !");
    }
}
