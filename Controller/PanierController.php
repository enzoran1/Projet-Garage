<?php 

namespace App\Controller;

use App\Models\PanierModel;


class PanierController extends Controller 
{ 
    public function index()
    { 
        return $this->render('panier/index');
    }
}