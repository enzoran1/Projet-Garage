<?php
namespace App\Controller;

use App\Models\ModeleModel;
use App\Controller\Controller;

class ModeleController extends Controller{
  public function reqAjax(){
        $chaine ='';
        
        $modelModel = new ModeleModel;
        $models = $modelModel->requete('SELECT * FROM modele WHERE id_marque = '.$_REQUEST['marque']);
        $models->fetchAll();

        foreach($models as $model)
        {
            $chaine .= '<option value="'.$model['id'].'">'.$model['nom'].'</option>';
        }
        return $chaine;
    }
}