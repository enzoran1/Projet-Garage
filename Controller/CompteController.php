<?php

namespace App\Controller;

use PDO;
use App\Core\Form;
use App\Models\MarqueModel;

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
            } else {
                //l'hydratation permet de transformer le contenu d' une base de données en objets et inversement
                $manager->hydrate($newUser);

                if (password_verify($_POST['mdp'], $manager->getMdp())) {
                    $manager->setSession();
                    if ($_SESSION['user']['role'] === 'ROLE_ADMIN') {
                        header('Location: /admin');
                        exit;
                    } else {
                        header('Location: /compte');
                        exit; // Redirection vers le dashboard
                    }
                } else {
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


    public function editProfileView() // Interface d'accès au formulaire pour la modification du profil 
    {
        ?> <script>
            // Le script JS permet de faire apparaitre le modal dans modal.js 
            if (testUser()) {
        </script>
        <?php
        if (Form::validate($_POST, ['password1', 'password2'])) {
            $manager = new UtilisateursModel;

            $newUser = $manager->findOneByEmail($_SESSION['user']['email']);

            if (!$newUser) {
                echo 'mot de passe incorrect';
                exit;
            } else {
                $manager->hydrate($newUser);
            }
            if (!password_verify($_POST['password1'], $manager->getMdp())) {
                echo 'Mot de passe incorrect';
                exit;
            } else {
                return $this->render('inscription/index');
            }
        }
        ?> <script>
            }
        </script> <?php
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

    // affichage du formulaire d'ajotu de véhicule si le formulaire n'est pas déjà complété
    public function ajoutVehicule()
    {
        if (!Form::validate($_POST, ['plaque_immatriculation', 'annee', 'km', 'id_marque', 'id_motorisation', 'id_type']))
        {
            $marqueModel = new MarqueModel;
            $motorisationModel = new MotorisationModel;
            $typeVehiculeModel = new TypeVehiculeModel;

            // on va chercher tout
            $marques = $marqueModel->findAllOrdre();
            $motorisations = $motorisationModel->findAll();
            $types = $typeVehiculeModel->findAll();

            // On génére la vue 
            return $this->render('compte/ajoutVehicule/index', compact('marques', 'motorisations', 'types'));
        }

        
        else // sinon, ajout de véhicule de l'utilisateur
        {
            $plaque_immatriculation = strip_tags($_POST['plaque_immatriculation'], PDO::PARAM_STR);
            $annee = strip_tags($_POST['annee'], PDO::PARAM_INT);
            $km = strip_tags($_POST['km'], PDO::PARAM_INT);
            $type_vehicule = ($_POST['id_type']);
            $motorisation = ($_POST['id_motorisation']);
            $marque = ($_POST['id_marque']);
            $id_utilisateur = $_SESSION['user']['id'];
            //création véhicule
            $newVehicule = new VehiculeModel();
            $newVehicule->setPlaque_immatriculation($plaque_immatriculation)
                ->setAnnee($annee)
                ->setKm($km)
                ->setId_marque($marque)
                ->setId_motorisation($motorisation)
                ->setId_type($type_vehicule)
                ->setId_utilisateur($id_utilisateur);
            $newVehicule->create();
            header('Location: /compte');
        } 
    }

    public function afficheVehiculesUtil()
    {
        //on instancie le modéle correspondant a la table vehicule
        $vehiculeModel = new VehiculeModel;
        // on va chercher toutes les vehicule de l'utilisateur
        $requete = $vehiculeModel->requete(
            'SELECT vehicule.*,marque.lib_marque, type_vehicule.lib_type, motorisation.lib_motorisation 
            FROM vehicule
            INNER JOIN marque ON vehicule.id_marque = marque.id
            INNER JOIN type_vehicule ON vehicule.id_type = type_vehicule.id_type
            INNER JOIN motorisation ON vehicule.id_motorisation = motorisation.id
            WHERE id_utilisateur = ' . $_SESSION['user']['id']
                        );
        $vehicules = $requete->fetchAll();
        // On génére la vue 
        return $this->render('/compte/vehicule', compact('vehicules'));
    }
    
    //supprimer vehicule
    public function supprimerVehicule(int $id)
    {
        $vehicule = new VehiculeModel;
        $vehicule->delete($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
