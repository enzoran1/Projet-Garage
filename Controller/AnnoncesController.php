<?php

namespace App\Controller;

use App\Models\AnnoncesModel;
use App\Models\PhotoModel;

class AnnoncesController extends Controller
<<<<<<< HEAD
{  
  public function index() // La fonction index renvoie toutes les annonces disponibles de "achat véhicule" 
  { 
    $annoncesModel = new AnnoncesModel;
    $photoModel = new PhotoModel;
    $requete = $annoncesModel->requete
    ( // Séléction de toutes les informations de chaque modèle pour les renvoyer à la vue 
      'SELECT a_vendre.*, marque.lib_marque, motorisation.lib_motorisation, type_vehicule.lib_type
      FROM a_vendre
      INNER JOIN marque ON a_vendre.id_marque = marque.id
      INNER JOIN motorisation ON a_vendre.id_motorisation = motorisation.id 
      INNER JOIN type_vehicule ON a_vendre.id_type = type_vehicule.id_type
      order by lib_marque asc'
    );
    $annonces = $requete->fetchAll();

    $photosBdd = $photoModel->findAll();

    $photos=[];

    foreach($photosBdd as $photoBdd) 
    { 
      if(!isset($photos[$photoBdd->id_avendre])) 
      {
=======
{
   
    public function index()
    {

    // instancier le model qui correspond à la bonne table
    $annoncesModel = new AnnoncesModel;
    $photoModel = new PhotoModel;
    //on récupère les données souhaité 
    $requete = $annoncesModel->requete('SELECT a_vendre.*, marque.lib_marque, motorisation.lib_motorisation, type_vehicule.lib_type
    FROM a_vendre
    INNER JOIN marque ON a_vendre.id_marque = marque.id
    INNER JOIN motorisation ON a_vendre.id_motorisation = motorisation.id 
    INNER JOIN type_vehicule ON a_vendre.id_type = type_vehicule.id_type
  
    order by id desc');

    $annonces = $requete->fetchAll();
    $photosBdd = $photoModel->findAll();
    $photos=[];
    foreach($photosBdd as $photoBdd) {
      if(!isset($photos[$photoBdd->id_avendre])) {
>>>>>>> enzo
        $photos[$photoBdd->id_avendre] = [];
      }
      $photos[$photoBdd->id_avendre][] = $photoBdd;
    }
<<<<<<< HEAD

    // On génére la vue 
    $this->render('annonces/index', compact('annonces', 'photos'));
  }
=======
        // On génére la vue 
        $this->render('annonces/index', compact('annonces', 'photos'));
    }
>>>>>>> enzo
}



