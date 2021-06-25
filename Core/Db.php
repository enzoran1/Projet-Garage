<?php

//design pattern singleton => un constructeur privé(on ne peut pas instancié) + méthode static
namespace App\Core;

// On "importe" PDO
use PDO;
use PDOException;

class Db extends PDO
{
    // Instance unique de la classe
    private static $instance;

    // Informations de connexion
    private const DBHOST = 'localhost';
    private const DBUSER = 'root';
    private const DBPASS = 'root';
    private const DBNAME = 'garage';

    private function __construct()
    {
        // DSN de connexion
        $_dsn = 'mysql:dbname=' . self::DBNAME . ';host=' . self::DBHOST;

        // On appelle le constructeur de la classe PDO
        try {
            parent::__construct($_dsn, self::DBUSER, self::DBPASS);

            //permet de faire toutes les transitions en utf8
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            //permet d'avoir un tableau associatif à chaque fetch
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            //définir le transfère d'erreur
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        // si connexion ne fonctionne pas => message d'exception
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //méthode qui vérifie si il y a une instance, si il y en a pas -> créer sinon la retourne
    // :self fait réferance a la class
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self(); //new de ma classe elle-même
        }
        return self::$instance;
    }
}
