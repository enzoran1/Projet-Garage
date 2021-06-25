<?php
namespace App\Models;

class PhotoModel extends Model
{
  protected $id;
  protected $nom;
  protected $id_a_vendre;

  public function __construct()
  {
    $this->table = 'photo';
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
   * Get the value of id_a_vendre
   */ 
  public function getId_a_vendre()
  {
    return $this->id_a_vendre;
  }

  /**
   * Set the value of id_a_vendre
   *
   * @return  self
   */ 
  public function setId_a_vendre($id_a_vendre)
  {
    $this->id_a_vendre = $id_a_vendre;

    return $this;
  }
}