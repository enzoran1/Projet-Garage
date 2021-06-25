<?php

use App\Controller\MainController;

class AchatController extends MainController 
{ 
    public function index()
    { 
        return $this->render('achat/index.php');
    }

    public function connexion()
    { 
        // algo de connexion : on renvoi sur le modèle concerné 
    }

    public function inscription()
    { 
        // algo d'inscription : renvoi vers le modèle concerné 
    }
}