<?php
namespace App\Controller;

use App\Models\AnnoncesModel;
use App\Models\MessageModel;
use App\Models\UtilisateursModel;

class AdminController extends Controller
{
  public function index()
  {
    if(empty($_SESSION) || $_SESSION['user']['role'] !== 'ROLE_ADMIN')
    { 
      // renvoyer une erreur, chercher le code 
      header('Location: /');
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

    $utilisateurModel = new UtilisateursModel;
    $requete = $utilisateurModel->requete('SELECT utilisateur.*,marque.lib_marque, type_vehicule.lib_type, motorisation.lib_motorisation, vehicule.annee, vehicule.plaque_immatriculation, vehicule.km 
    FROM utilisateur
    INNER JOIN vehicule ON utilisateur.id = vehicule.id_utilisateur
    INNER JOIN marque ON vehicule.id_marque = marque.id
    INNER JOIN type_vehicule ON vehicule.id_type = type_vehicule.id_type
    INNER JOIN motorisation ON vehicule.id_motorisation = motorisation.id
    WHERE utilisateur.role = "ROLE_USER" '
    );
    $utilisateur = $requete->fetchAll();
    // on va chercher toutes les utilisateur

    //$utilisateur = $utilisateurModel->findAll();

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

  //supprimer message
    public function supprimerMessage(int $id)
    {
        $message = new MessageModel;
        $message->delete($id);
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
    //supprimer utilisateur
    public function supprimerUtilisateur(int $id)
    {
        $utilisateurs = new UtilisateursModel;
        $utilisateurs->delete($id);
        header('Location: '.$_SERVER['HTTP_REFERER']);
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
      return $this->render('annonces/index', compact('annonces'));
      
    }
  }
}