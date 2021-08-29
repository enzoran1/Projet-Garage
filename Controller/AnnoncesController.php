<?php

namespace App\Controller;

use App\Models\AnnoncesModel;
use App\Models\PhotoModel;

class AnnoncesController extends Controller
{
   
    public function index()
    {

    // instancier le model 
    $annoncesModel = new AnnoncesModel;
    $photoModel = new PhotoModel;
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
        $photos[$photoBdd->id_avendre] = [];
      }
      $photos[$photoBdd->id_avendre][] = $photoBdd;

    }


        // On génére la vue 
        $this->render('annonces/index', compact('annonces', 'photos'));
    }
}



