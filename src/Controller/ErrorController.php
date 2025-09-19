<?php

namespace App\Controller; // sert à éviter le conflit des noms


/**
 * Classe qui gère l'affichage des erreurs proprement
 */
class ErrorController extends Controller
{
    public function show(string $errorMessage): void
    {
        $this->render("errors/default", [
            "errorMessage" => $errorMessage
        ]);

    }

}
