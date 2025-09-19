<?php
/*Ici on définit un tableau avec un chemin (path) ``/about/`` qu'on relit à un controleur ``PageController``
grâce au code : ``$this->routes = require_once APP_ROOT."/config/routes.php";``
*/
return [
    "/about/" => ["controller" => "App\controller\PageController", "action" => "about"],
    "/test/" => ["controller" => "App\controller\PageController", "action" => "test2"],
];