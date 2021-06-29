<?php
namespace App\Controller;
use App\Models\ClientModel;

class AdminController extends Controller
{
  public function index()
  {
    if(empty($_SESSION) || $_SESSION['user']['role'] !== 'ROLE_ADMIN')
    { 
      // renvoyer une erreur, chercher le code 
      return $this->render('main/index');
    } 
    else 
    { 
      return $this->render('admin/index');
    }
  }

  public function show(){

    //on instancie le modéle correspondant a la table 'utilisitateur

    $utilisateurModel = new ClientModel;
    
    // on va chercher toutes les utilisateur

    $utilisateur = $utilisateurModel->findAll();

    // On génére la vue 
    $this->render('admin/show/index', compact('utilisateur'));  
  }
}