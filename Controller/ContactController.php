<?php
namespace App\Controller;

use App\Core\Form;
use App\Models\MessageModel;

class ContactController extends Controller
{    
    public function index(){

        $this->render('contact/index');
        
    }

    public function contact()
    {
        if (Form::validate($_POST, ['nom', 'prenom','email', 'message'])) {
            $nom = strip_tags($_POST['nom']);
            $prenom = strip_tags($_POST['prenom']);
            // On nettoie l'e-mail pour éviter les failles XSS et on chiffre le mot de passe
            $email = strip_tags($_POST['email']);
            $message = strip_tags($_POST['message']);
            //création message
            $newUser = new MessageModel();
            $newUser->setNom($nom)
                ->setPrenom($prenom)
                ->setEmail($email)
                ->setMessage($message);
                
                
            
            $newUser->create();

            header('Location: ../Main');
        } else {
            echo 'Veuillez compléter tous les champs';
        }
    }
}