<?php

class ContactController extends AbstractController
{    
    /**
     * index : méthode par défaut du contrôleur
     * une méthode sera pour la plupart du temps vouée à afficher une vue dont le fichier sera du même nom 
     * que la méthode en question
     *
     * @return void
     */
    public function index()
    {
        return $this->renderView('contact/index.php');
    }
}