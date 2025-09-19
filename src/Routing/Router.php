<?php

namespace App\Routing;

use App\Controller\ErrorController;
use Exception; // ⚠️ ou mettre "\" devant \Exception si on utilise les 'namespace' cela indique qu'il s'agit d'une classe native de PHP


//classe qui gère la distribution des requêtes au bon contrôleur
class Router
{
    // donne l'accès au fichier /config/routes.php
    private $routes;
    public function __construct()
    {
        $this->routes = require_once APP_ROOT."/config/routes.php";
    }
    // gérer la requête et dispatche au controleur (traduction de "handlerequest" => "gère la demande")
    public function handleRequest(string $uri)
    {
        try{
        // on récupère l'url ici, et on la nettoie avec la fonction ``normalizePath()``
        $path = $this->normalizePath($uri);
        //condition qui vérifie si la route existe :
        if(!isset($this->routes[$path])){
            throw new Exception("La route n'existe pas");
        }
        $route = $this->routes[$path];

        $controllerPath = $route["controller"];
        $action = $route["action"];

        //condition qui vérifie si un controlleur existe :
        if(!class_exists($controllerPath)){
            throw new Exception("La classe n'existe pas");
        }
        $controller = new $controllerPath();

        //condition qui vérifie si l'action (ou méthode) existe :
        if(!method_exists($controller, $action)){
            throw new Exception("La méthode ou l'action n'existe pas!");
        }
        $controller->$action();
        } catch (Exception $e){
            $errorController = new ErrorController();
            $errorController->show($e->getMessage());
        }
    }

    public static function normalizePath(string $uri): string
    {
        $path = parse_url($uri, PHP_URL_PATH);
        $path = rtrim($path, "/") . "/"; //rtrim() enlève le '/' et le rajoute si il est manquant!
        return $path;
    }



}