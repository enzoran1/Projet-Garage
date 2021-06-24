<?php
namespace App\Controller;

use App\Core\Form;
use App\Models\UtilisateursModel;

class CompteController extends Controller
{    
    public function index(){
        if(empty($_SESSION))
        { 
            $this->render('compte/connexion/index');
        }
        else 
        { 
            $this->render('compte/dashboard/index');
        }
    }

    //connexion
   public function login()
    {
        echo " c'est bon";
        exit;
        //Vérifie si le formulaire est complet
        if(Form::validate($_POST, ['email', 'mdp']))
        {
            //formulaire complet
            // on va chercher dans la base de données l'utilisateur avec l'email entré
            $utilisateurModel = new UtilisateursModel;
            // strip_tags = nettoie l'e-mail pour éviter les failles XSS
            $utilisateurArray = $utilisateurModel->findOneByEmail(strip_tags($_POST['email']));

            // si l'utilisateur n'existe pas
            if(!$utilisateurArray)
            {
                // On envoie un message de session
                echo " L'email ou le mot de passe est incorrecte";
                return $this->render('/Compte');
                exit;
            }
            // l'utilisateur existe
            // on verifie si mdp est correcte
            if(password_verify($_POST['mdp'], $utilisateurModel->getMdp()))
            {
                //mdp correcte, on créé la session
                $utilisateurModel->setSession();
                return $this->render('/Compte/dashboard');
            }
        }
    }

    /**
     * Déconnexion de l'utilisateur
     * @return exit 
     */
    public function logout()
    {
        unset($_SESSION['utilisateur']);
        //redirige l'utilisateur vers la page d'où il vient
        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit;
    }

} 
