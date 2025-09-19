<?php

namespace App\Controller; // sert à éviter le conflit des noms

class PageController 
{
    // public function test() // méthode basique (``public`` = accessible à l'extérieur de la classe)
    // {
    //     echo"TEST !!!";
    // }
    // public static function test2() // méthode static (accessible à l'extérieur de la classe sans avoir besoin d'instancier, on utilise '::' pour l'appeler)
    // {
    //     echo"TEST STATIC !!!";
    // }

    public function home(): void // typage = 'void' car pas de retour
    {
        $gretting = "Hello";
        $name = "John";
        $this->render("pages/home", [
            "grettings" => $gretting,
            "name" => $name,
        ]);
    }

    public function about()
    {
        $this->render("pages/about");

    }
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
