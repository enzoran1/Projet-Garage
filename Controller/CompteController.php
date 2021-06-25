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
                        'id'            => $testPassword['id'], 
                        'nom'           => $testPassword['nom'],
                        'prenom'        => $testPassword['prenom'], 
                        'adresse'       => $testPassword['adresse'],
                        'email'         => $testPassword['email'],
                        'mdp'           => $testPassword['mdp'],
                        'tel'           => $testPassword['tel'],
                        'role'          => $testPassword['role'],
                        'date_creation' => $testPassword['date_creation']
                    ];

                    // SINON : on fait un beau foreach, ou une belle méthode  ---- 

                    // on redirige sur le dashboard
                    header('Location: ../Compte');

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