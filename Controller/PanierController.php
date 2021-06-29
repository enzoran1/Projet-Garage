<?php 

namespace App\Controller;

class PanierController extends Controller 
{ 
    public function index()
    { 
        return $this->render('panier/index');
    }
}