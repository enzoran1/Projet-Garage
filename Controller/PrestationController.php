<?php
namespace App\Controller;

use App\Models\CategorieprestationsModel;

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
}