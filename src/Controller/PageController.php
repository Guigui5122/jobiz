<?php

namespace App\Controller; // sert à éviter le conflit des noms

class PageController extends Controller
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
    public function test()
    {
        $this->render("pages/test");

    }

}
