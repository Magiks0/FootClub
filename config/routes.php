<?php

use App\Router\{Route, Router};
use App\Controller\{
    HomeController,
    PlayerController,
    TeamController,
    MatchController,
};

function registerRoutes(Router $router) {
    $router->addRoute(new Route('/', HomeController::class, 'index'));
    $router->addRoute(new Route('/choix', HomeController::class, 'choice'));

    $router->addRoute(new Route('/players', PlayerController::class, 'index'));
    $router->addRoute(new Route('/ajoutJoueur', PlayerController::class, 'add'));
    $router->addRoute(new Route('/modif', PlayerController::class, 'modify'));

    $router->addRoute(new Route('/ajoutTeam', TeamController::class, 'add'));
    $router->addRoute(new Route('/teams', TeamController::class, 'liste'));
    
    $router->addRoute(new Route('/ajoutMatch', MatchController::class, 'add'));
    $router->addRoute(new Route('/matchs', MatchController::class, 'liste'));
}
