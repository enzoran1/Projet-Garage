<?php
echo '<script> console.Log("test du fichier php") </script>'; 

use App\Models\ModeleModel;

$chaine ='';
        $modelModel = new ModeleModel;
        $models = $modelModel->requete('SELECT * FROM modele WHERE id_marque = '.$_REQUEST['marque']);
        return $models->fetchAll();

        foreach($models as $model)
        {
            $chaine .= '<option value="'.$model['id'].'">'.$model['nom'].'</option>';
        }

        echo json_encode($chaine);
        