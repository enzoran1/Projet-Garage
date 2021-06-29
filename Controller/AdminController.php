<?php
namespace App\Controller;

use App\Models\AnnoncesModel;
use App\Models\ClientModel;
use App\Models\MessageModel;

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

  public function utilisateurs(){

    if(empty($_SESSION) || $_SESSION['user']['role'] !== 'ROLE_ADMIN')
    { 
     // renvoyer une erreur, chercher le code 
     return $this->render('main/index');
    } 

    //on instancie le modéle correspondant a la table 'utilisitateur

    $utilisateurModel = new ClientModel;
    
    // on va chercher toutes les utilisateur

    $utilisateur = $utilisateurModel->findAll();

    // On génére la vue 
    $this->render('admin/utilisateurs/index', compact('utilisateur'));  
  }


  public function message()
  { 
    if(empty($_SESSION) || $_SESSION['user']['role'] !== 'ROLE_ADMIN')
    { 
      // renvoyer une erreur, chercher le code 
      return $this->render('main/index');
    }
    else
    {
      // instancier le model 
      $messageModel = new MessageModel;

      // méthode 
      $messages = $messageModel->findAll();
      // render la view
      return $this->render('admin/message/index', compact('messages'));
      
    }
  }

  
  public function annonces()
  { 
    if(empty($_SESSION) || $_SESSION['user']['role'] !== 'ROLE_ADMIN')
    { 
      // renvoyer une erreur, chercher le code 
      return $this->render('main/index');
    }
    else
    {
      // instancier le model 
      $annoncesModel = new AnnoncesModel;

      // méthode 
      $annonces = $annoncesModel->findAll();
      // render la view
      return $this->render('admin/annonces/index', compact('annonces'));
      
    }
  }
}