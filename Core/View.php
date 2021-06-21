<?php

class View
{
    public CONST VIEW_DIR = BASE_DIR . 'templates/';
    

    public string $filename;
    

    public function __construct(string $filename)
    {
        $this->filename = $filename;
        

    }

    public function render(array $data)
    {
        // On extrait les données du tableau $data
        extract($data);

        
        ob_start(); // On démarre la tamporisation
        include self::VIEW_DIR . $this->filename;
        $body = ob_get_clean(); // On recupère le rendu et on nettoie le tampon

        
        
        
        // On affiche la layout globale avec le rendue de la vue dans la variable $body
        require self::VIEW_DIR. 'base.php';
    }
}