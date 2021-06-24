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
        //Vérifie si le formulaire est complet
        if(Form::validate($_POST, ['email', 'mdp']))
        {
            // si complet : on initialise les variables récupérées par le formulaire 
            $email = $_POST['email'];
            $password = $_POST['mdp'];
            //formulaire complet
            // On instancie l'utilisateur model pour obtenir les méthodes de récupération
            $utilisateurModel = new UtilisateursModel;

            // récupère un utilisateur en prenant en argument son email
             // strip_tags = nettoie l'e-mail pour éviter les failles XSS
            $testEmail = $utilisateurModel->findOneByEmail(strip_tags($email));

            // Si le testEmail est bon on test le password : 
            if($testEmail)
            { 
                $testPassword = $utilisateurModel->findOneByPassword($password);

                if($testPassword)
                { 
                    // on créée la session 
                    $_SESSION['user'] = 
                    [
                        'email' => $email
                    ];

                    // on redirige sur le dashboard
                    return $this->render('Compte/dashboard/index');

                }
                else 
                { 
                    echo 'Mot de passe ou email incorrect';
                }
            }
            else 
            { 
                echo 'Email ou mot de passe incorrect';
            }
        }
        else 
        { 
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
        //redirige l'utilisateur vers la page d'où il vient
        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit;
    }

} 
