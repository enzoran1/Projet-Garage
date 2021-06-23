<?php
namespace App\Controller;

use App\Models\Model;

class CompteController extends Controller
{    
    public function index(){
        if(empty($_SESSION))
        { 
            $this->render('compte/connexion/index');
        }
        else 
        { 
            $this->render('compte/dashboard/index');
        }
    }

    public function testconnexion()
    { 
        echo 'ok'; exit;
        $connexion = new Model;
        if($connexion->findBy($_POST['email'], $_POST['password']) !== false)
        { 
            echo 'ok';
        }
        else
        { 
            echo 'erreur';
        }
        
    }
} 

