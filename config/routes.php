<?php

use App\Router\{Route, Router};
use App\Controller\{
    HomeController,
    PlayerController
};

function registerRoutes(Router $router) {
    $router->addRoute(new Route('/', HomeController::class, 'index'));
    $router->addRoute(new Route('/players', PlayerController::class, 'index'));
}
