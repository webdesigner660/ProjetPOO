<?php

namespace App\Controller;

use App\App;
use Symplefony\Controller;
use Laminas\Diactoros\ServerRequest;
use App\Model\Repository\RepoManager;

    class AuthController extends Controller
    {
        public static function isAdmin(): bool
        {
            // TODO: Le vrai contrôle de session
            return true;
        }

    }