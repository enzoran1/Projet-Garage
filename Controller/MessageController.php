<?php
namespace App\Controller;

use App\Models\MessageModel;

class MessageController extends Controller
{    
    /**
     * Cette méthode affichera une page listant tout les utilisateurs
     * 
     *
     * @return void
     */
    public function index(){

        //on instancie le modéle correspondant a la table 'utilisitateur

        $messageModel = new MessageModel;
        
        // on va chercher toutes les utilisateur

        $message = $messageModel->findAll();

        // On génére la vue 
        $this->render('message/index', compact('message'));

        
        
    }
}