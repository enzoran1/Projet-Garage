<?php
namespace App\Controller;

use App\Core\Form;
use App\Models\AnnoncesModel;
use App\Models\MarqueModel;
use App\Models\MessageModel;
use App\Models\MotorisationModel;
use App\Models\TypeVehiculeModel;
use App\Models\UtilisateursModel;
use App\Models\VehiculeModel;
use PDO;

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
    $requete = $utilisateurModel->requete('SELECT utilisateur.*,marque.lib_marque, type_vehicule.lib_type, motorisation.lib_motorisation, vehicule.annee, vehicule.plaque_immatriculation, vehicule.km, vehicule.id_utilisateur
    FROM utilisateur
    INNER JOIN vehicule ON utilisateur.id = vehicule.id_utilisateur
    INNER JOIN marque ON vehicule.id_marque = marque.id
    INNER JOIN type_vehicule ON vehicule.id_type = type_vehicule.id_type
    INNER JOIN motorisation ON vehicule.id_motorisation = motorisation.id
    WHERE utilisateur.role = "ROLE_USER" 
    order by nom asc'
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
        
    }
    //supprimer utilisateur
    
    public function supprimerUtilisateur(int $id){

      $utilisateurModel = new UtilisateursModel;
      $vehiculeModel = new VehiculeModel;

      $vehiculeModel->requete('DELETE vehicule.* FROM vehicule WHERE id_utilisateur = '.$id);
      $utilisateurModel->requete('DELETE utilisateur.* FROM utilisateur WHERE id = '.$id);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
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

  public function ajoutAnnoncesFrom(){

    $marqueModel = new MarqueModel;
    $motorisationModel = new MotorisationModel;
    $typeVehiculeModel = new TypeVehiculeModel;

    // on va chercher tout
    $marques = $marqueModel->findAllOrdre();
    $motorisations = $motorisationModel->findAll();
    $types = $typeVehiculeModel->findAll();

    
    return $this->render('admin/annonces/ajoutAnnonces/index',compact('marques', 'motorisations', 'types'));
  }

  public function ajoutAnnonces(){

    if (Form::validate($_POST, ['plaque_immatriculation', 'annee', 'km', 'id_marque', 'id_motorisation', 'id_type','description','prix'])) {
      $plaque_immatriculation = strip_tags($_POST['plaque_immatriculation'], PDO::PARAM_STR);
      $description = strip_tags($_POST['description'], PDO::PARAM_STR);
      $annee = strip_tags($_POST['annee'], PDO::PARAM_INT);
      $km = strip_tags($_POST['km'], PDO::PARAM_INT);
      $type_vehicule = ($_POST['id_type']);
      $motorisation = ($_POST['id_motorisation']);
      $marque = ($_POST['id_marque']);
      $prix = ($_POST['prix']);
      $id_utilisateur = $_SESSION['user']['id'];
      //création véhicule
      $newAnnonces = new AnnoncesModel();
      $newAnnonces->setPlaque_immatriculation($plaque_immatriculation)
          ->setAnnee($annee)
          ->setKm($km)
          ->setId_marque($marque)
          ->setDescription($description)
          ->setPrix($prix)

          ->setId_motorisation($motorisation)
          ->setId_type($type_vehicule);
        
      $newAnnonces->create();
      header('Location: /admin');
  } else {
      echo 'Veuillez compléter tous les champs';
  }
}

  }
