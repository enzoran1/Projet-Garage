<?php

namespace App\Controller;

abstract class Controller{

    public function render(string $ficher, array $donnees = []){

        // on extrait le contenu des donnees
        extract($donnees);

        // on démare le buffer de sortie

        ob_start();

        // a partir de ce point toute sortie est conservée en mémoire

       

        // on crée le chemin vers la vue

        require_once ROOT.'/Views/'.$ficher.'.php';
        $contenu = ob_get_clean();

        require_once ROOT.'/Views/base.php';
    }

}