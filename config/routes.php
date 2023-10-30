<?php

use App\Router\{Route, Router};
use App\Controller\{
    HomeController,
    PlayerController
};

function registerRoutes(Router $router) {
    $router->addRoute(new Route('/FootClub/', HomeController::class, 'index'));
    $router->addRoute(new Route('/FootClub/players', PlayerController::class, 'index'));
    $router->addRoute(new Route('/FootClub/ajout', PlayerController::class, 'add'));
}
