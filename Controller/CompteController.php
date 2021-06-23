<?php
namespace App\Controller;

use App\Core\Form;
use App\Models\Model;
use App\Models\UtilisateursModel;

class CompteController extends Controller
{    
    public function index(){
        if(empty($_SESSION))
        { 
            $this->render('compte/index');
        }
        else 
        { 
            $this->render('compte/dashboard');
        }
    }

    //connexion
   public function login()
    {
        //Vérifie si le formulaire est complet
        if(Form::validate($_POST, ['email', 'mdp']))
        {
            //formulaire complet
            // on va chercher dans la base de données l'utilisateur avec l'email entré
            $utilisateurModel = new UtilisateursModel;
            $utilisateurArray = $utilisateurModel->findOneByEmail(strip_tags($_POST['email']));

            // si l'utilisateur n'existe pas
            if(!$utilisateurArray)
            {
                // On envoie un message de session
                http_response_code(404);
                header('Location: /');
                exit;
            }
            // l'utilisateur existe
            $user = $utilisateurModel->hydrate($utilisateurArray);
            // on verifie si mdp est correcte
            if(password_verify($_POST['mdp'], $user->getMdp()))
            {
                //mdp correcte, on créé la session
                $user->setSession();
                header('Location: /');
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
        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit;
    }

} 
