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

  //les utilisateurs

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
    LEFT JOIN vehicule ON utilisateur.id = vehicule.id_utilisateur
    LEFT JOIN marque ON vehicule.id_marque = marque.id
    LEFT JOIN type_vehicule ON vehicule.id_type = type_vehicule.id_type
    LEFT JOIN motorisation ON vehicule.id_motorisation = motorisation.id
    WHERE utilisateur.role = "ROLE_USER" 
    order by nom asc'
    );
    $utilisateur = $requete->fetchAll();
    // on va chercher toutes les utilisateur ainsi que les informations de leurs véhicules 

    // On génére la vue 
    $this->render('admin/utilisateurs/index', compact('utilisateur'));
  }


  public function modifClientForm($id)
  //formulaire de modification utilisateur
  {
    $utilisateurModel = new UtilisateursModel;
    $requete = $utilisateurModel->requete(
      'SELECT utilisateur.*,marque.lib_marque, type_vehicule.lib_type, motorisation.lib_motorisation, vehicule.km, 
      vehicule.annee, vehicule.id_marque, vehicule.id_motorisation, vehicule.id_type, vehicule.id_utilisateur
      FROM utilisateur
      LEFT JOIN vehicule ON utilisateur.id = vehicule.id_utilisateur
      LEFT JOIN marque ON vehicule.id_marque = marque.id
      LEFT JOIN type_vehicule ON vehicule.id_type = type_vehicule.id_type
      LEFT JOIN motorisation ON vehicule.id_motorisation = motorisation.id
      WHERE utilisateur.id = ' . $id
    );


    $utilisateurs = $requete->fetchAll();
    $marqueModel = new MarqueModel;
    $motorisationModel = new MotorisationModel;
    $typeVehiculeModel = new TypeVehiculeModel;
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

    // On instancie le modèle
    $utilisateurModifAdmin = new UtilisateursModel;


    // On hydrate
    $utilisateurModifAdmin
      ->setId($id)
      ->setNom($nom)
      ->setPrenom($prenom)
      ->setAdresse($adresse)
      ->setTel($tel)
      ->setEmail($email);

    // On enregistre
    $utilisateurModifAdmin->update();


    //il faut modifier la session pour rafraichir les valeurs du dashboard


    header('Location: /admin/utilisateurs');
    exit;
  }
  public function supprimerUtilisateur(int $id)
  {

    $utilisateurModel = new UtilisateursModel;
    $vehiculeModel = new VehiculeModel;

    $vehiculeModel->requete('DELETE vehicule.* FROM vehicule WHERE id_utilisateur = ' . $id);
    $utilisateurModel->requete('DELETE utilisateur.* FROM utilisateur WHERE id = ' . $id);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }














  // les messages

  public function message()
  { // Accessible uniquement pour l'utilisateur admin, affiche les messages envoyés via le forumulaire de contact 
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


  public function supprimerMessage(int $id)
  {   //supprimer un message du formulaire de contact 

    $message = new MessageModel;
    $message->delete($id);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
















  // les annonces

  public function supprimerAnnonces(int $id)
  { //supprimer une annonce enregistré par l'admin  
    $annoncesModel = new AnnoncesModel;
    $photoModel = new PhotoModel;
    $photoModel->requete('DELETE photo.* FROM photo WHERE id_avendre = ' . $id);
    $annoncesModel->requete('DELETE a_vendre.* FROM a_vendre WHERE id = ' . $id);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }


  public function annonces()
  { // Afficher les annonces 
    if (empty($_SESSION) || $_SESSION['user']['role'] !== 'ROLE_ADMIN') {
      return $this->render('main/index');
    } else {
      // instancier le model 
      $annoncesModel = new AnnoncesModel;
      $photoModel = new PhotoModel;
      $requete = $annoncesModel->requete('SELECT a_vendre.*, marque.lib_marque, motorisation.lib_motorisation, type_vehicule.lib_type
      FROM a_vendre
      INNER JOIN marque ON a_vendre.id_marque = marque.id
      INNER JOIN motorisation ON a_vendre.id_motorisation = motorisation.id 
      INNER JOIN type_vehicule ON a_vendre.id_type = type_vehicule.id_type
    
      order by id desc');
      // il faut ajouter la putain de photo :'(  
      // requete pour lié les photo et l'annonce 
      // $requete2 = $photoModel->requete('SELECT * FROM photo WHERE id_avendre ='.$id)

      // méthode 
      $annonces = $requete->fetchAll();


      $photosBdd = $photoModel->findAll();


      $photos = [];

      foreach ($photosBdd as $photoBdd) {
        if (!isset($photos[$photoBdd->id_avendre])) {
          $photos[$photoBdd->id_avendre] = [];
        }
        $photos[$photoBdd->id_avendre][] = $photoBdd;
      }


      // render la view
      return $this->render('admin/annonces/index', compact('annonces', 'photos'));
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

  public function modifAnnoncesFrom($id)
  {

    $annoncesModel = new AnnoncesModel;
    $requete = $annoncesModel->requete(
      'SELECT a_vendre.*,marque.lib_marque, type_vehicule.lib_type, motorisation.lib_motorisation
    FROM a_vendre
    INNER JOIN marque ON a_vendre.id_marque = marque.id
    INNER JOIN type_vehicule ON a_vendre.id_type = type_vehicule.id_type
    INNER JOIN motorisation ON a_vendre.id_motorisation = motorisation.id
    WHERE a_vendre.id = 
    ' . $id
    );
    $annonces = $requete->fetchAll();

    $marqueModel = new MarqueModel;
    $motorisationModel = new MotorisationModel;
    $typeVehiculeModel = new TypeVehiculeModel;

    // on va chercher tout
    $marques = $marqueModel->findAllOrdre();
    $motorisations = $motorisationModel->findAll();
    $types = $typeVehiculeModel->findAll();


    return $this->render('admin/annonces/modifAnnonces/index', compact('annonces', 'marques', 'motorisations', 'types'));
  }

  public function modifAnnonces($id)
  {


    $description = strip_tags($_POST['description'], PDO::PARAM_STR);
    $marque = strip_tags($_POST['marque'], PDO::PARAM_STR);
    $motorisation = strip_tags($_POST['motorisation'], PDO::PARAM_STR);
    $type = strip_tags($_POST['id_type'], PDO::PARAM_STR);
    $immatriculation = strip_tags($_POST['plaque_immatriculation']);
    $prix = strip_tags($_POST['prix']);
    $annee = strip_tags($_POST['annee']);
    $km = strip_tags($_POST['km']);


    // On instancie le modèle
    $modifAnnonces = new AnnoncesModel;


    // On hydrate
    $modifAnnonces
      ->setId($id)
      ->setId_marque($marque)
      ->setId_motorisation($motorisation)
      ->setId_type($type)
      ->setKm($km)
      ->setPrix($prix)
      ->setPlaque_immatriculation($immatriculation)
      ->setDescription($description)
      ->setAnnee($annee);



    // On enregistre
    $modifAnnonces->update();


    //il faut modifier la session pour rafraichir les valeurs du dashboard


    header('Location: /admin/annonces/');
    exit;
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
      $newAnnonces
        ->setPlaque_immatriculation($plaque_immatriculation)
        ->setAnnee($annee)
        ->setKm($km)
        ->setId_marque($marque)
        ->setDescription($description)
        ->setPrix($prix)
        ->setId_motorisation($motorisation)
        ->setId_type($type_vehicule);
      $newAnnonces->create();
      header('Location: /admin/annonces');
    } else {
      echo 'Veuillez compléter tous les champs';
    }
  }




  //ajouter une photo
  public function ajouterPhoto(int $id)
  {



    $uploaddir = '../public/image/';
    if (!empty($_FILES['photo'])  && $_FILES['photo']['error'] == 0) {
      $uploadfile = $uploaddir . $_FILES['photo']['name'];
      move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);
    }
    $newPhoto = new PhotoModel();
    $newPhoto->setLib_photo(str_replace('../public', '', $uploadfile))
      ->setId_avendre($id);
    $newPhoto->create();
    header('Location: /admin/annonces');
  }






  //Les prestations
  public function prestations()
  {
    if (empty($_SESSION) || $_SESSION['user']['role'] !== 'ROLE_ADMIN') {
      // renvoyer une erreur, chercher le code 
      return $this->render('main/index');
    } else {
      // instancier le model 

      $categorieModel = new CategorieprestationsModel;

      // méthode 

      $categories = $categorieModel->findAll();
      // render la view
      return $this->render('admin/prestations/index', compact('categories'));
    }
  }

  public function prestationsafficher($id)
  {

    if (empty($_SESSION) || $_SESSION['user']['role'] !== 'ROLE_ADMIN') {
      // renvoyer une erreur, chercher le code 
      return $this->render('main/index');
    } else {
      // instancier le model 
      $prestationModel = new PrestationModel;
      $requete = $prestationModel->requete(
        'SELECT prestation.*
      FROM prestation
      WHERE prestation.id_categorie = 
      ' . $id
      );
      $prestations = $requete->fetchAll();
      $categorieModel = new CategorieprestationsModel;
      $requete = $categorieModel->requete(
        'SELECT *
      FROM categorie_prestation
      WHERE id = 
      ' . $id
      );
      $categorie = $requete->fetchAll();
      // render la view
      return $this->render('admin/prestations/prestation/index', compact('prestations', 'categorie'));
    }
  }




  public function ajoutPrestationsForm()
  {
    $catprestaModel = new CategorieprestationsModel;
    // on va chercher tout
    $categories = $catprestaModel->findAll();
    return $this->render('admin/prestations/ajoutPrestations/index', compact('categories'));
  }



  public function ajoutPrestations()
  {

    if (Form::validate($_POST, ['type', 'duree', 'prix', 'categorie'])) {
      $type = strip_tags($_POST['type'], PDO::PARAM_STR);
      $categorie = strip_tags($_POST['categorie'], PDO::PARAM_STR);
      $prix = strip_tags($_POST['prix'], PDO::PARAM_INT);
      $duree = strip_tags($_POST['duree'], PDO::PARAM_INT);

      //création véhicule
      $newPrestations = new PrestationModel();
      $newPrestations
        ->setId_categorie($categorie)
        ->setPrix($prix)
        ->setType($type)
        ->setDuree($duree);
      $newPrestations->create();
      header('Location: /admin/prestations/');
    } else {
      echo 'Veuillez compléter tous les champs';
    }
  }

  public function modifierPrestaForm(int $id)
  {
    $prestationModel = new PrestationModel;
    $requete = $prestationModel->requete(
      'SELECT prestation.*,categorie_prestation.lib_categorie
    FROM prestation
    INNER JOIN categorie_prestation ON prestation.id_categorie = categorie_prestation.id
    WHERE prestation.id = 
    ' . $id
    );
    $prestations = $requete->fetchAll();

    $categorieModel = new CategorieprestationsModel;

    // on va chercher tout
    $categories = $categorieModel->findAll();
    return $this->render('admin/prestations/modifPrestation/index', compact('prestations', 'categories'));
  }

  public function modifierPresta(int $id)
  {
    $type = strip_tags($_POST['type'], PDO::PARAM_STR);
    $prix = strip_tags($_POST['prix'], PDO::PARAM_INT);
    $duree = strip_tags($_POST['duree'], PDO::PARAM_INT);
    $id_categorie = strip_tags($_POST['categorie'], PDO::PARAM_INT);
    // On instancie le modèle
    $prestationModel = new PrestationModel;
    // On hydrate
    $prestationModel
      ->setId($id)
      ->setId_categorie($id_categorie)
      ->setType($type)
      ->setDuree($duree)
      ->setPrix($prix);
    // On enregistre
    $prestationModel->update();
    //il faut modifier la session pour rafraichir les valeurs du dashboard
    header('Location: /admin/prestations/');
    exit;
  }

  public function supprimerPresta(int $id)
  {
    $prestationModel = new PrestationModel;
    $prestationModel->requete('DELETE  FROM prestation WHERE id = ' . $id);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
}
