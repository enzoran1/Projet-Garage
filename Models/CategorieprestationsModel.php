<?php

namespace App\Models;

class CategorieprestationsModel extends Model
{
  protected $id;
  protected $lib_categorie;

  public function __construct()
  {
    $this->table = 'categorie_prestation';
  }

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */ 
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of lib_categorie
   */ 
  public function getLib_categorie()
  {
    return $this->lib_categorie;
  }

  /**
   * Set the value of lib_categorie
   *
   * @return  self
   */ 
  public function setLib_categorie($lib_categorie)
  {
    $this->lib_categorie = $lib_categorie;

    return $this;
  }

  public function findOneById(string $id)
  {
    return $this->requete("SELECT * FROM $this->table WHERE id = ?", [$id])->fetch();
  }
}