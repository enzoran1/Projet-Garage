<?php

namespace App\Controller;

use App\Core\Form;
use App\Models\UtilisateursModel;

class CompteController extends Controller
{
    public function index()
    {
        //on instancie le modéle correspondant a la table 'utilisitateur




        if (empty($_SESSION)) {
            $this->render('compte/connexion/index');
        } else {
            $this->render('compte/dashboard/index');
        }
    }

    //connexion
    public function login()
    {

        //Vérifie si le formulaire est complet
        if (Form::validate($_POST, ['email', 'mdp'])) {
            //formulaire complet
            // On instancie l'utilisateur model pour obtenir les méthodes de récupération
            $manager = new UtilisateursModel();
            // récupère un utilisateur en prenant en argument son email
            // strip_tags = nettoie l'e-mail pour éviter les failles XSS
            $newUser = $manager->findOneByEmail(strip_tags($_POST['email']));

            if (!$newUser) {
                echo 'Email ou mot de passe incorrect';
                exit;
            }
            $manager->hydrate($newUser);
            if (password_verify($_POST['mdp'], $manager->getMdp())) {
                $manager->setSession();
                header('Location: /compte');
                exit; // Redirection vers le dashboard
            }
        } else {
            echo "veuillez remplir tous les champs";
        }
    }



    /**
     * Déconnexion de l'utilisateur
     * @return exit 
     */
    public function logout()
    {
        unset($_SESSION['utilisateur']);
        session_destroy();
        header('Location: /Main');
    }
} 


// C:\Users\33620\Desktop\Projet-Garage\Controller\CompteController.php:41:
// object(stdClass)[7]
//   public 'id' => string '1' (length=1)
//   public 'nom' => string 'martin' (length=6)
//   public 'prenom' => string 'aubertin' (length=8)
//   public 'adresse' => string '6 rue du machin' (length=15)
//   public 'email' => string 'martin.aubertin@gmail.com' (length=25)
//   public 'mdp' => string 'coco' (length=4)
//   public 'tel' => string '0620363432' (length=10)
//   public 'role' => string 'utilisateur' (length=11)
//   public 'date_creation' => string '24/06/2021' (length=10)
