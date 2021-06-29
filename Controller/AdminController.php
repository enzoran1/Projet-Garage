<?php

namespace App\Controller;

use App\Models\ClientModel;
use App\Models\MessageModel;


class AdminController extends Controller
{
  public function index()
  {
    if (empty($_SESSION) || $_SESSION['user']['role'] !== 'ROLE_ADMIN') {
      // renvoyer une erreur, chercher le code 
      return $this->render('main/index');
    } else {
      return $this->render('admin/index');
    }
  }

  public function show()
  {

    if (empty($_SESSION) || $_SESSION['user']['role'] !== 'ROLE_ADMIN') {
      // renvoyer une erreur, chercher le code 
      return $this->render('main/index');
    }

    //on instancie le modéle correspondant a la table 'utilisitateur

    $utilisateurModel = new ClientModel;

    // on va chercher toutes les utilisateur

    $utilisateur = $utilisateurModel->findAll();

    // On génére la vue 
    $this->render('admin/show/index', compact('utilisateur'));
  }

  public function annonce()
  {
    // silence is golden
  }

  public function message()
  {
    if (empty($_SESSION) || $_SESSION['user']['role'] !== 'ROLE_ADMIN') {
      // renvoyer une erreur, chercher le code 
      return $this->render('main/index');
    } else {
      // instancier le model 
      $messageModel = new MessageModel;

      // méthode 
      $messages = $messageModel->findAll();
      // render la view
      return $this->render('admin/message/index', compact('messages'));
    }
  }
}
