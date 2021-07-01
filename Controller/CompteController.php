<?php

namespace App\Controller;

use PDO;
use App\Core\Form;
use App\Models\MarqueModel;
use App\Models\ModeleModel;
use App\Models\MotorisationModel;
use App\Models\TypeVehiculeModel;
use App\Models\VehiculeModel;
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
        if (Form::validate($_POST, ['email', 'mdp'])) 
        {
            //formulaire complet
            // On instancie l'utilisateur model pour obtenir les méthodes de récupération
            $manager = new UtilisateursModel();
            // récupère un utilisateur en prenant en argument son email
            // strip_tags = nettoie l'e-mail pour éviter les failles XSS
            $newUser = $manager->findOneByEmail(strip_tags($_POST['email']));

            if (!$newUser) 
            {
                echo 'Email ou mot de passe incorrect';
                exit;
            }
            else
            {
                //l'hydratation permet de transformer le contenu d' une base de données en objets et inversement
                $manager->hydrate($newUser);

                if (password_verify($_POST['mdp'], $manager->getMdp())) 
                {
                    $manager->setSession();
                    if ($_SESSION['user']['role'] === 'ROLE_ADMIN') 
                    {
                        header('Location: /admin');
                        exit;
                    } 
                    else 
                    {
                        header('Location: /compte');
                        exit; // Redirection vers le dashboard
                    }
                }
                else 
                {
                    echo "veuillez remplir tous les champs";
                }
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
        session_destroy();
        header('Location: /Main');
    }


    public function editProfileView() // pas besoin de crypter
    { 
        
        ?> <script> if(testUser()) 
        {   </script>
            <?php
            if(Form::validate($_POST, ['password1', 'password2']))
            { 
                $manager = new UtilisateursModel;

                $newUser = $manager->findOneByEmail($_SESSION['user']['email']);

                if(!$newUser)
                {
                    echo 'mot de passe incorrect';
                    exit;
                }
                else 
                { 
                    $manager->hydrate($newUser);
                }
                if (!password_verify($_POST['password1'], $manager->getMdp())) 
                { 
                    echo 'Mot de passe incorrect';
                    exit;
                }
                else 
                { 
                    return $this->render('inscription/index');
                }
            }
            ?> <script> 
        } </script> <?php
    } 

    //modifier profil utilisateur
    public function modifierProfil()
    {
        $nom = strip_tags($_POST['nom'], PDO::PARAM_STR);
        $prenom = strip_tags($_POST['prenom'], PDO::PARAM_STR);
        $adresse = strip_tags($_POST['adresse'], PDO::PARAM_STR);
        $tel = strip_tags($_POST['tel'], PDO::PARAM_INT);
        $role = 'ROLE_USER';
        $date = date('Y-m-d H:i:s');
        $email = strip_tags($_POST['email'], PDO::PARAM_STR);
        $mdp = password_hash($_POST['mdp'], PASSWORD_ARGON2I);
        $id = ($_SESSION['user']['id']);

        // On instancie le modèle
        $utilisateurModif = new UtilisateursModel;
        
        // On hydrate
        $utilisateurModif->setId($id)
                        ->setNom($nom)
                        ->setPrenom($prenom)
                        ->setAdresse($adresse)
                        ->setTel($tel)
                        ->setEmail($email)
                        ->setMdp($mdp)
                        ->setRole($role)
                        ->setDate_creation($date);

        // On enregistre
        $utilisateurModif->update();
        $utilisateurModif->setSession();
        
        //il faut modifier la session pour rafraichir les valeurs du dashboard


        header('Location: /compte');
        exit; // Redirection vers le dashboard
    }

    // affichage du formulaire d'ajotu de véhicule

    public function ajoutVehiculeForm(){
        //on instancie le modéle correspondant a la table 'utilisitateur

        $marqueModel = new MarqueModel;
        //$modelModel = new ModeleModel;
        $motorisationModel = new MotorisationModel;
        $typeVehiculeModel = new TypeVehiculeModel;
        
        // on va chercher toutes les utilisateur
        
        $marques = $marqueModel->findAllOrdre();
        //$models = $modelModel->requete('SELECT * FROM modele WHERE id_marque = '.$_POST['marque']);
        //return $models->fetchAll();
        $motorisations = $motorisationModel->findAll();
        $types = $typeVehiculeModel->findAll();

        // On génére la vue 
        
        $this->render('compte/ajoutVehicule/index', compact('marques','motorisations','types'));
    }
    
    public function reqAjax(){
        $chaine ='';
        $modelModel = new ModeleModel;
        $models = $modelModel->requete('SELECT * FROM modele WHERE id_marque = '.$_POST['marque']);
        return $models->fetchAll();

        foreach($models as $model)
        {
            $chaine .= '<option value="'.$model['id'].'">'.$model['nom'].'</option>';
        }

        echo $chaine;
    }

    //ajout de véhicule de l'utilisateur
    public function ajoutVehicule()
    {
        if (Form::validate($_POST, ['plaque_immatriculation', 'annee', 'km', 'marque', 'modele','motorisation','type_vehicule'])) {
            $plaque_immatriculation = strip_tags($_POST['plaque_immatriculation'], PDO::PARAM_STR);
            $annee = strip_tags($_POST['annee'], PDO::PARAM_INT);
            $km = strip_tags($_POST['km'], PDO::PARAM_INT);
            $modele = ($_POST['modele']);
            $type_vehicule = ($_POST['type_vhicule']);
            $motorisation = ($_POST['motorisation']);
            //création véhicule
            $newVehicule = new VehiculeModel();
            $newVehicule->setPlaque_immatriculation($plaque_immatriculation)
                        ->setAnnee($annee)
                        ->setKm($km)
                        ->setId_modele($modele)
                        ->setId_motorisation($motorisation)
                        ->setId_type($type_vehicule)
                        ->setId_utilisateur($_SESSION['user']['id']);
            $newVehicule->create();
            header('Location: /compte/dashboard');
        } else {
            echo 'Veuillez compléter tous les champs';
        }
    }

    public function afficheVehiculesUtil()
    {
        //on instancie le modéle correspondant a la table vehicule
        $vehiculeModel = new VehiculeModel;
        // on va chercher toutes les vehicule de l'utilisateur
        $vehicules = $vehiculeModel->requete('SELECT * FROM vehicule WHERE id_utilisateur = '.$_SESSION['user']['id']);
        return $vehicules->fetchAll();
        // On génére la vue 
        header('Location: /compte');
        exit; // Redirection vers le dashboard
    }
}

