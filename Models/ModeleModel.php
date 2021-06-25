<?php
namespace App\Models;

class ModeleModel extends Model
{
  protected $id;
  protected $nom;
  protected $type_mine;
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
   * Get the value of type_mine
   */ 
  public function getType_mine()
  {
    return $this->type_mine;
  }

  /**
   * Set the value of type_mine
   *
   * @return  self
   */ 
  public function setType_mine($type_mine)
  {
    $this->type_mine = $type_mine;

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