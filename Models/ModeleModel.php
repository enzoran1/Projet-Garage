<?php
namespace App\Models;

class ModeleModel extends Model
{
  protected $id;
  protected $nom;
  protected $id_marque;

  public function __construct()
  {
    $this->table = 'modele';
  }

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of nom
   */ 
  public function getNom()
  {
    return $this->nom;
  }

  /**
   * Set the value of nom
   *
   * @return  self
   */ 
  public function setNom($nom)
  {
    $this->nom = $nom;

    return $this;
  }


  /**
   * Get the value of id_marque
   */ 
  public function getId_marque()
  {
    return $this->id_marque;
  }

  /**
   * Set the value of id_marque
   *
   * @return  self
   */ 
  public function setId_marque($id_marque)
  {
    $this->id_marque = $id_marque;

    return $this;
  }

  
}