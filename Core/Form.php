<?php
namespace App\Core;
//générateur de formulaire
class Form 
{
  private $formCode = "";


  //Méthode a améliorer (si email est bien email, tel....)
  /**
  * Valide si tous les champs proposés sont remplis
  * @param array $form Tableau contenant les champs à vérifier (en général issu de $_POST ou $_GET)
  * @param array $fields Tableau listant les champs à vérifier
  * @return bool 
  */
  public static function validate(array $form, array $fields)
  {
    // On parcourt chaque champ
    foreach($fields as $field)
    {
      // Si le champ est absent ou vide dans le tableau
      if(!isset($form[$field]) || empty($form[$field]))
      {
        // On sort en retournant false
        return false;
      }
    }
    // Ici le formulaire est "valide"
    return true;
  }
}