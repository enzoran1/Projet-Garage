<?php

namespace App\Controller;

use PDO;
use App\Core\Form;
use App\Models\UtilisateursModel;

class InscriptionController extends Controller
{
    public function index()
    {

        $this->render('inscription/index');
    }

    //inscription
    public function inscription()
    {
        if (Form::validate($_POST, ['nom', 'prenom', 'adresse', 'tel', 'email', 'mdp'])) {
            $nom = strip_tags($_POST['nom'], PDO::PARAM_STR);
            $prenom = strip_tags($_POST['prenom'], PDO::PARAM_STR);
            $adresse = strip_tags($_POST['adresse'], PDO::PARAM_STR);
            $tel = strip_tags($_POST['tel'], PDO::PARAM_INT);
            $role = 'ROLE_USER';
            $date = date('Y-m-d H:i:s');
            // On nettoie l'e-mail pour éviter les failles XSS et on chiffre le mot de passe
            $email = strip_tags($_POST['email'], PDO::PARAM_STR);
            $mdp = password_hash($_POST['mdp'], PASSWORD_ARGON2I);
            //création utilisateur
            $newUser = new UtilisateursModel();
            $newUser
                ->setNom($nom)
                ->setPrenom($prenom)
                ->setAdresse($adresse)
                ->setTel($tel)
                ->setEmail($email)
                ->setMdp($mdp)
                ->setRole($role)
                ->setDate_creation($date);
            $newUser->create();

            header('Location: ../Compte');
        } else {
            echo 'Veuillez compléter tous les champs';
        }
    }
}
