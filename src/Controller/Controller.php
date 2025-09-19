<?php

namespace App\Controller;

class Controller
{
    // render() = méthode qui gère le rendu
    protected function render(string $path, array $params =[])
    {
        // variable qui contient le chemin du template 'home.php' que l'on veut afficher
        $filePath = APP_ROOT."/templates/$path.php";

        // on vérifie si le fichier existe
        if(!file_exists($filePath)){
            //s'il n'existe pas, on affiche un message d'erreur :
            echo "⚠️ Le fichier $filePath n'existe pas";
        } else {
            // extract() permet de tranformer chaque clé du tableau en variable
            extract($params);
            
            // sinon on inclut le fichier 'une fois seulement' !
            require_once $filePath;
        }
    }
}