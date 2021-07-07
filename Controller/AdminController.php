<?php

namespace App\Controller;

use App\Core\Form;
use App\Models\AnnoncesModel;
use App\Models\CategorieprestationsModel;
use App\Models\MarqueModel;
use App\Models\MessageModel;
use App\Models\MotorisationModel;
use App\Models\PhotoModel;
use App\Models\PrestationModel;
use App\Models\TypeVehiculeModel;
use App\Models\UtilisateursModel;
use App\Models\VehiculeModel;
use PDO;

class AdminController extends Controller
{
  public function index()
  {
    if (empty($_SESSION) || $_SESSION['user']['role'] !== 'ROLE_ADMIN') {
      // renvoyer une erreur, chercher le code 
      header('Location: /');
    } else {
      return $this->render('admin/index');
    }
  }

  public function utilisateurs()
  {

    if (empty($_SESSION) || $_SESSION['user']['role'] !== 'ROLE_ADMIN') {
      // renvoyer une erreur, chercher le code 
      return $this->render('main/index');
    }

    //on instancie le modéle correspondant a la table 'utilisitateur

    $utilisateurModel = new UtilisateursModel;
    $requete = $utilisateurModel->requete(
      'SELECT utilisateur.*,marque.lib_marque, type_vehicule.lib_type, motorisation.lib_motorisation, vehicule.annee, vehicule.plaque_immatriculation, vehicule.km, vehicule.id_utilisateur
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

  //formulaire de modification utilisateur
  public function modifClientForm($id)
  {
    $utilisateurModel = new UtilisateursModel;
    $requete = $utilisateurModel->requete(
      'SELECT utilisateur.*,marque.lib_marque, type_vehicule.lib_type, motorisation.lib_motorisation, vehicule.km, vehicule.annee, vehicule.id_marque, vehicule.id_motorisation, vehicule.id_type, vehicule.id_utilisateur
    FROM utilisateur
    INNER JOIN vehicule ON utilisateur.id = vehicule.id_utilisateur
    INNER JOIN marque ON vehicule.id_marque = marque.id
    INNER JOIN type_vehicule ON vehicule.id_type = type_vehicule.id_type
    INNER JOIN motorisation ON vehicule.id_motorisation = motorisation.id
    WHERE utilisateur.id = 
    ' . $id
    );
    $utilisateurs = $requete->fetchAll();
    //var_dump($utilisateurs);exit;
    $marqueModel = new MarqueModel;
    $motorisationModel = new MotorisationModel;
    $typeVehiculeModel = new TypeVehiculeModel;
    // on va chercher tout
    $marques = $marqueModel->findAllOrdre();
    $motorisations = $motorisationModel->findAll();
    $types = $typeVehiculeModel->findAll();

    
    return $this->render('admin/utilisateurs/modifClient/index', compact('marques', 'motorisations', 'types', 'utilisateurs'));
  }
//modifier profil utilisateur
public function modifierProfiladmin(int $id)
{
    $nom = strip_tags($_POST['nom'], PDO::PARAM_STR);
    $prenom = strip_tags($_POST['prenom'], PDO::PARAM_STR);
    $adresse = strip_tags($_POST['adresse'], PDO::PARAM_STR);
    $tel = strip_tags($_POST['tel'], PDO::PARAM_INT);
    $email = strip_tags($_POST['email'], PDO::PARAM_STR);
    $id_marque = ($_POST['id_marque']);
    $id_motorisation = ($_POST['id_motorisation']);
    $id_type = ($_POST['id_type']);
    $annee = strip_tags($_POST['annee'], PDO::PARAM_INT);
    $km = strip_tags($_POST['km'], PDO::PARAM_INT);

    // On instancie le modèle
    $utilisateurModifAdmin = new UtilisateursModel;
    $vehiculeModifAdmin = new VehiculeModel;

    // On hydrate
    $utilisateurModifAdmin
        ->setId($id)
        ->setNom($nom)
        ->setPrenom($prenom)
        ->setAdresse($adresse)
        ->setTel($tel)
        ->setEmail($email);
    $vehiculeModifAdmin
      ->setId($id)
      ->setId_type($id_type)
      ->setId_motorisation($id_motorisation)
      ->setId_marque($id_marque)
      ->setKm($km)
      ->setAnnee($annee);

    // On enregistre
    $utilisateurModifAdmin->update();
    $vehiculeModifAdmin->update();


    //il faut modifier la session pour rafraichir les valeurs du dashboard


    header('Location: /admin');
    exit; 
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

  //supprimer message
  public function supprimerMessage(int $id)
  {
    $message = new MessageModel;
    $message->delete($id);
  }
  //supprimer utilisateur

  public function supprimerUtilisateur(int $id)
  {

    $utilisateurModel = new UtilisateursModel;
    $vehiculeModel = new VehiculeModel;

    $vehiculeModel->requete('DELETE vehicule.* FROM vehicule WHERE id_utilisateur = ' . $id);
    $utilisateurModel->requete('DELETE utilisateur.* FROM utilisateur WHERE id = ' . $id);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

  public function supprimerAnnonces(int $id)
  {
    $annoncesModel = new AnnoncesModel;
    $photoModel = new PhotoModel;
    $photoModel->requete('DELETE photo.* FROM photo WHERE id_avendre = ' . $id);
    $annoncesModel->requete('DELETE a_vendre.* FROM a_vendre WHERE id = ' . $id);
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }


  public function annonces()
  {
    if (empty($_SESSION) || $_SESSION['user']['role'] !== 'ROLE_ADMIN') {
      // renvoyer une erreur, chercher le code 
      return $this->render('main/index');
    } else {
      // instancier le model 
      $annoncesModel = new AnnoncesModel;
      $requete = $annoncesModel->requete('SELECT a_vendre.*, marque.lib_marque, motorisation.lib_motorisation, type_vehicule.lib_type
      FROM a_vendre
      INNER JOIN marque ON a_vendre.id_marque = marque.id
      INNER JOIN motorisation ON a_vendre.id_motorisation = motorisation.id 
      INNER JOIN type_vehicule ON a_vendre.id_type = type_vehicule.id_type
      order by lib_marque asc');
      // il faut ajouter la putain de photo :'(  

      // méthode 
      $annonces = $requete->fetchAll();

      // render la view
      return $this->render('admin/annonces/index', compact('annonces'));
    }
  }

  public function ajoutAnnoncesFrom()
  {

    $marqueModel = new MarqueModel;
    $motorisationModel = new MotorisationModel;
    $typeVehiculeModel = new TypeVehiculeModel;

    // on va chercher tout
    $marques = $marqueModel->findAllOrdre();
    $motorisations = $motorisationModel->findAll();
    $types = $typeVehiculeModel->findAll();


    return $this->render('admin/annonces/ajoutAnnonces/index', compact('marques', 'motorisations', 'types'));
  }

  public function ajoutAnnonces()
  {

    if (Form::validate($_POST, ['plaque_immatriculation', 'annee', 'km', 'id_marque', 'id_motorisation', 'id_type', 'description', 'prix'])) {
      $plaque_immatriculation = strip_tags($_POST['plaque_immatriculation'], PDO::PARAM_STR);
      $description = strip_tags($_POST['description'], PDO::PARAM_STR);
      $annee = strip_tags($_POST['annee'], PDO::PARAM_INT);
      $km = strip_tags($_POST['km'], PDO::PARAM_INT);
      $type_vehicule = ($_POST['id_type']);
      $motorisation = ($_POST['id_motorisation']);
      $marque = ($_POST['id_marque']);
      $prix = ($_POST['prix']);
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
    } else 
    {
      echo 'Veuillez compléter tous les champs';
    }
  }

  //ajouter une photo
  public function ajouterPhoto(int $id)
  {
    /* if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

        // Vérifie le type MIME du fichier
        if (in_array($filetype, $allowed)) {
            // Vérifie si le fichier existe avant de le télécharger.
            if (file_exists("/image/" . $_FILES["photo"]["name"])) {
                $message = $_FILES["photo"]["name"] . " existe déjà.";
            } else {
                move_uploaded_file($_FILES["photo"]["tmp_name"], "/image/" . $_FILES["photo"]["name"]);
                $message = "Votre fichier a été téléchargé avec succès.";
            }
        } else {
            $message = "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
        }
      } else {
        $message = "Error: " . $_FILES["photo"]["error"];
    }*/

    $uploaddir = '../public/image/';
    if (!empty($_FILES['photo'])  && $_FILES['photo']['error'] == 0) 
    {
      $uploadfile = $uploaddir . $_FILES['photo']['name'];
      move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);
    }
    $newPhoto = new PhotoModel();
    $newPhoto->setLib_photo($uploadfile)
             ->setId_avendre($id);
    $newPhoto->create();
    header('Location: /admin');
  }

  public function modfifAnnonces(){

  }


  //Les prestations
  public function prestations()
  { 
    if(empty($_SESSION) || $_SESSION['user']['role'] !== 'ROLE_ADMIN')
    { 
      // renvoyer une erreur, chercher le code 
      return $this->render('main/index');
    }
    else
    {
      // instancier le model 
      $prestationModel = new PrestationModel;
      
      // méthode 
      $prestations = $prestationModel->findAll();
      // render la view
    return $this->render('admin/prestations/index', compact('prestations'));
      
    }
  }
  public function ajoutPrestationsForm(){
    $catprestaModel = new CategorieprestationsModel;
    // on va chercher tout
    $categories = $catprestaModel->findAll();
    return $this->render('admin/prestations/ajoutPrestations/index',compact('categories'));
  }
}
