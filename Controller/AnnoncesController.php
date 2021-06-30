<?php
namespace App\Controller;

use App\Models\AnnoncesModel;

class AnnoncesController extends Controller
{    
    /**
     * Cette méthode affichera une page listant tout les utilisateurs
     * 
     *
     * @return void
     */
    public function index(){

        //on instancie le modéle correspondant a la table 'utilisitateur

        $annoncesModel = new AnnoncesModel;
        
        // on va chercher toutes les utilisateur

        $annonces = $annoncesModel->findAll();
        

        // On génére la vue 
        $this->render('annonces/index', compact('annonces'));

        
        
    }
}