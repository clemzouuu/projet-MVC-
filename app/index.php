<?php

use App\Route\Route;

require_once 'vendor/autoload.php';

// Répertoire où se trouvent les contrôleurs
$controllerDir = dirname(__FILE__) . '/src/Controller';
$dirs = scandir($controllerDir);
$controllers = [];

foreach ($dirs as $dir) {
    if ($dir === "." || $dir === "..") {
        continue;
    }
    // Ajout du contrôleur à la liste des contrôleurs
    $controllers[] = "App\\Controller\\" . pathinfo($controllerDir . DIRECTORY_SEPARATOR . $dir)['filename'];
}

$routesObj = [];

foreach ($controllers as $controller) {
    $reflection = new ReflectionClass($controller);
    foreach ($reflection->getMethods() as $method) {
       foreach ($method->getAttributes() as $attribute) {
           /** @var Route $route */
           $route = $attribute->newInstance();
           $route->setController($controller)
               ->setAction($method->getName());

           $routesObj[] = $route;
       }
    }
}

// Recupérer l'URL demandée
$url = "/" . trim(explode("?", $_SERVER['REQUEST_URI'])[0], "/");

foreach ($routesObj as $route) {

    if (!$route->match($url) || !in_array($_SERVER['REQUEST_METHOD'], $route->getMethods())) {
        continue;
    }

    $controlerClassName = $route->getController();
    $action = $route->getAction();
    $params = $route->mergeParams($url);

    new $controlerClassName($action, $params);
    exit();
}

$errorMessage = "Erreur, veuillez retourner sur la page précédente :(";

echo "<h1 class='errorMessage'>$errorMessage</h1>";


die;
