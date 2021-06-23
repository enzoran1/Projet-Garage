<?php

class UtilisateurController extends AbstractController
{    
    /**
     * index : méthode par défaut du contrôleur
     * une méthode sera pour la plupart du temps vouée à afficher une vue dont le fichier sera du même nom 
     * que la méthode en question
     *
     * @return void
     */
    public function index()
    { // La fonction index renvoi sur connexion si il n'y a pas de session
        if(!isset($_SESSION))
        { 
            return $this->renderView('utilisateur/connexion.php');
        }
        else 
        { // si il y a une session, il renvoi sur le dashboard
            return $this->renderView('utilisateur/dashboard.php');    
        }
    }
}