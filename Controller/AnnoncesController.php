<?php

namespace App\Controller;

use App\Models\AnnoncesModel;
use App\Models\PhotoModel;

class AnnoncesController extends Controller
{
   
    public function index()
    {

    // instancier le model qui correspond à la bonne table
    $annoncesModel = new AnnoncesModel;
    $photoModel = new PhotoModel;
    //on récupère les données souhaité 
    $annonces = $annoncesModel->lesAnnonces();
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



