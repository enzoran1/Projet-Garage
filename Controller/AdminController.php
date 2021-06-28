<?php
namespace App\Controller;

class AdminController extends Controller
{
  public function index()
  {
    if($_SESSION['user']['role'] !== 'ROLE_ADMIN')
    { 
      // renvoyer une erreur, chercher le code 
      echo 'Veuillez contacter l\'administrateur système';
      return $this->render('main/index');
    } 
    else 
    { 
      return $this->render('admin/index');
    }
  }
}