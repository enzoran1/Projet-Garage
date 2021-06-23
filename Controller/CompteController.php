<?php
namespace App\Controller;

class CompteController extends Controller
{    
    public function index(){
        if(!isset($_SESSION))
        { 
            $this->render('compte/connexion');
        }
        else 
        { 
            $this->render('compte/dashboard');
        }
    }

    public function connexion()
    { 
    
    }
} 

