<?php
// on charge l'autoload :
require_once __DIR__ . "/../vendor/autoload.php";

// Définition d'une constante pour avoir la racine de l'app
define('APP_ROOT', dirname(__DIR__));

// grâce au 'namespace' on précise qu'elle classe on veut utiliser avec "use" :
use App\Controller\PageController;

$pageController = new PageController();
$pageController->home();
