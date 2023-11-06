<?php

use App\Router\{Route, Router};
use App\Controller\{
    HomeController,
    PlayerController,
    TeamController,
    MatchController,
};

function registerRoutes(Router $router) {
    $router->addRoute(new Route('/FootClub/', HomeController::class, 'index'));
    $router->addRoute(new Route('/FootClub/choix', HomeController::class, 'choice'));

    $router->addRoute(new Route('/FootClub/players', PlayerController::class, 'index'));
    $router->addRoute(new Route('/FootClub/ajoutJoueur', PlayerController::class, 'add'));
    $router->addRoute(new Route('/FootClub/modif', PlayerController::class, 'modify'));

    $router->addRoute(new Route('/FootClub/ajoutTeam', TeamController::class, 'add'));
    $router->addRoute(new Route('/FootClub/teams', TeamController::class, 'liste'));
    
    $router->addRoute(new Route('/FootClub/ajoutMatch', MatchController::class, 'add'));
    $router->addRoute(new Route('/FootClub/matchs', MatchController::class, 'liste'));
}
