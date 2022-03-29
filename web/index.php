<?php

require __DIR__."/../vendor/autoload.php";

define ('SITE_ROOT', realpath(dirname(__FILE__)));

session_start();

use App\Request;
use App\Router;

$request = new Request();

$router = new Router($request);

$router->loadYaml(__DIR__."/../config/routing.yml");

try{
    // On récupère la route correspondant à la requête
    $route = $router->getRouteByRequest();
    // On récupère une réponse en appelant dynamiquement l'action d'un contrôleur
    $response = $route->call($request, $router);
    // On envoie la réponse au client
    $response->send();
}catch (\Exception $e) {
    // En cas d'erreur, nous affichons l'erreur
    echo $e->getMessage();
}