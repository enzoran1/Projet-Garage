<?php
namespace App\Controller;

use App\Models\CategorieprestationsModel;
use App\Models\PrestationModel;

class PrestationController extends Controller
{    
    public function index(){

      
          // instancier le model 
        
          $categorieModel = new CategorieprestationsModel;
          
          // méthode 
        
          $categories = $categorieModel->findAll();
          // render la view
        return $this->render('/prestation/index', compact('categories'));
          
    }

    public function afficherPrestations($id){
         // instancier le model 
      $prestationModel = new PrestationModel;
      $requete = $prestationModel->requete(
        'SELECT prestation.*
      FROM prestation
      WHERE prestation.id_categorie = 
      '.$id
      );
      $prestations = $requete->fetchAll();
      $categorieModel = new CategorieprestationsModel;
      $requete = $categorieModel->requete('SELECT *
      FROM categorie_prestation
      WHERE id = 
      '.$id
      );
      $categorie = $requete->fetchAll();
      // render la view
    return $this->render('prestation/prestations/index', compact('prestations','categorie')); 
    }
}

