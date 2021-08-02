<?php
namespace App;

class Autoloader
{
    // cette fonction permet de lancer le spl qui va détecter le chargement de class
    // les méthodes statiques va permettre de ne pas instancier la class et d'appeller directement le register()
    static function register()
    {
        // la fonction spl permet de détecter automatiquement les instanciation (new) de class si la class n'est pas connu elle 
        //exécutera une methode de notre class que l'ont aura definit
        spl_autoload_register([
            //la methode magique __CLASS__ me permet d'aller chercher la class actuelle
            __CLASS__,
            'autoload'
        ]);
    }
    static function autoload($class)
    {
        //on récupère dans $class la totalité du namespace de la classe concernée
        // On retire App\

        $class = str_replace(__NAMESPACE__ . '\\', '', $class);
        
        // On remplace les \ par des /
        $class = str_replace('\\', '/', $class);
        // Le DIR  sert à savoir dans quel dossier se trouve l'autoloader
        $fichier = __DIR__ . '/' . $class . '.php';
        
        // on vérifie si le fichier existe
        if(file_exists($fichier))
        {
            require_once $fichier;
        }
    }
}