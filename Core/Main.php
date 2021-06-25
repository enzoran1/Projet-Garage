<?php

namespace App\Core;
session_start();
use App\Controller\MainController;

class Main
{
    public function start()
    {
      // On retire le 'trailing slash' éventuel de l'url (le slash a la fin quoi ^^)
      // On récupére l'url

        $uri = $_SERVER['REQUEST_URI'];
      
      // on vérifie que uri n'est pas vide et se termine par un "/"

        if(!empty($uri) && $uri != "/" && $uri[-1] === "/")
        {
            // on enléve le "/"
            $uri = substr($uri, 0, -1);
            echo $uri;
            //on envoie un code de redirection permanente
            http_response_code(301);
            // On redirige vers l'url sans "/"
            header('Location: '.$uri);
        }

      // On gére les paramétres d'url
      // on sépare les parametres dans un tableau
      $params = [];

        if(isset($_GET['p']))
        {
            $params = explode('/', $_GET['p']);

        }
       

        if($params[0] != '')
        {
          // on a au moin un paramétre
          //on recupere le nom du controleur a instancier
          // on met une majuscule en premiere lettre, on ajoute le namespace complet avant et on ajout 'Controller' aprés
          $controller = '\\App\\Controller\\'. ucfirst(array_shift($params)). 'Controller';

          //on instancie le controleur
          $controller = new $controller();
          // on recupére le deuxieme paramétre d'url
          $action = (isset($params[0])) ? array_shift($params) : 'index';

          if(method_exists($controller, $action)){
              // si il reste des parametres on les passe a la methode
              (isset($params[0])) ? call_user_func_array([$controller, $action], $params) : $controller->$action();

          }else{
              http_response_code(404);
              echo "La page rechercher n'existe pas";
          }
          else
            {
                http_response_code(404);
                echo "La page rechercher n'existe pas";
            }
        }
      else
        {
          
            // on n'a pas de parametres
            // on instancie le controleur par defaut
            $controller = new MainController;

            // On appelle la méthode index 

            $controller->index();
        }
    }
}