<?php
// on démarre la session
session_start();
/* 
    IMPLEMENTATION DU MVC EN PHP
*/
define('BASE_DIR','../');

/* Autoloader */
require BASE_DIR . 'core/Autoloader.php';

try
{
    $request_uri = trim($_SERVER['REQUEST_URI'], '/'); // ex: blog/article/2
    $request_uri_exploded = explode('/',$request_uri); // ex: ['blog','article','2']
    $route = array(
        'controller' => !empty($request_uri_exploded[0]) ? $request_uri_exploded[0] : 'home',
        'action' => $request_uri_exploded[1] ?? 'index',
        'param' => $request_uri_exploded[2] ?? null
    );

    $controllerClassName = ucfirst($route['controller']) . 'Controller';
    // On défini l'action
    $action = $route['action'];

    // On inclue le fichier de la classse du contrôleur
    if(!file_exists(BASE_DIR . 'src/Controller/' . $controllerClassName . '.php'))
        throw new Exception("Le fichier contrôleur $controllerClassName.php n'existe pas.", 1);

    // On test si la classe du contrôleur existe, si non alors on "jètte" une exception
    if(!class_exists($controllerClassName))
        throw new Exception("Le contrôleur $controllerClassName n'existe pas.", 1);

    // On instancie notre contrôleur
    $controller = new $controllerClassName();

    // On test si la classe du contrôleur existe, si non alors on "jètte" une exception
    if(!method_exists($controller, $action))
        throw new Exception("L'action $action du contrôleur $controllerClassName n'existe pas.", 1);

    // On execute l'action
    $controller->$action($route['param']);

}
catch(Exception $e)
{
    echo $e->getMessage();
    die;
}
