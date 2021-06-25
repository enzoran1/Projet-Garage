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
            // si complet : on initialise les variables récupérées par le formulaire 
            $email = $_POST['email'];
            $password = $_POST['mdp'];

            //formulaire complet
            // On instancie l'utilisateur model pour obtenir les méthodes de récupération
            $utilisateurModel = new UtilisateursModel;


            // récupère un utilisateur en prenant en argument son email
            // strip_tags = nettoie l'e-mail pour éviter les failles XSS
            $testEmail = $utilisateurModel->findOneByEmail(strip_tags($email));
            $user = $utilisateurModel->hydrate($testEmail);

            // Si le testEmail est bon on test le password : 
            if (password_verify($_POST['mdp'], $utilisateurModel->getMdp())) {


                // on créée la session 
                $_SESSION["user"] = [
                    "id" => $user->id,
                    "prenom" => $user->prenom,


                ];



                // on va chercher toutes les utilisateur



                // on redirige sur le dashboard
                header('Location: ../Compte');
            } else {
                echo 'Email ou mot de passe incorrect';
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
