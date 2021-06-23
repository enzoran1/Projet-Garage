<?php


use App\Autoloader;
use App\Core\Main;

// on definit une constante contenant le dossier racine du projet
// la fonction dirname permet d'accédé au dossier parent
// __DIR__ est le dossier dans le quel on se trouve

define('ROOT', dirname(__DIR__));

//on importe l'autoloader
require_once ROOT.'/Autoloader.php';
Autoloader::register();


//On instancie Main (qui est notre routeur)

$app = new Main();

//on démarre l'application

$app->start();

