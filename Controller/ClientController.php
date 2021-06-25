<?php
namespace App\Controller;

use App\Models\ClientModel;

class ClientController extends Controller
{    
    /**
     * Cette méthode affichera une page listant tout les utilisateurs
     * 
     *
     * @return void
     */
    public function index(){

        //on instancie le modéle correspondant a la table 'utilisitateur

        $utilisateurModel = new ClientModel;
        
        // on va chercher toutes les utilisateur

        $utilisateur = $utilisateurModel->findAll();

        // On génére la vue 
        $this->render('client/index', compact('utilisateur'));

        
        
    }
}