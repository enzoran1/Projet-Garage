<?php
namespace App\Controller;

use App\Core\Form;
use App\Models\UtilisateursModel;

class InscriptionController extends Controller
{    
    public function index(){

        $this->render('inscription/index');
        
    }

    //inscription
    public function inscription()
    {
        if(Form::validate($_POST, ['nom', 'prenom', 'adresse', 'tel', 'email', 'mdp', 'mdp2']))
        {
            $nom = ($_POST['nom']);
            $prenom = ($_POST['prenom']);
            $adresse = ($_POST['adresse']);
            $tel = ($_POST['tel']);
            $role = 'ROLE_USER';
            $date = date('Y-m-d H:i:s');
            // On nettoie l'e-mail pour éviter les failles XSS et on chiffre le mot de passe
            $email = strip_tags($_POST['email']);
            $mdp = password_hash($_POST['mdp'], PASSWORD_ARGON2I);
            //création utilisateur
            $newUser = new UtilisateursModel();
            $newUser->setNom($nom)
                    ->setPrenom($prenom)
                    ->setAdresse($adresse)
                    ->setTel($tel)
                    ->setEmail($email)
                    ->setMdp($mdp)
                    ->setRole($role)
                    ->setDate_creation($date);
            //$newUser['role'] = !isset($newUser['role']) ? 'ROLE_USER' : $newUser['role'];
            $newUser->create();

            header('Location: ../Compte');
        }
        else{
            echo 'Veuillez compléter tous les champs';
        }
    }
}