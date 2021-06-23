<?php

use App\src\Manager\Model;

class PrestationsModel extends Model
{
  protected $id;
  protected $type;
  protected $prix;
  protected $duree;

  public function __construct()
    {
      $this->table = 'prestation';
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
   * Get the value of type
   */ 
  public function getType()
  {
    return $this->type;
  }

  /**
   * Set the value of type
   *
   * @return  self
   */ 
  public function setType($type)
  {
    $this->type = $type;

    return $this;
  }

  /**
   * Get the value of prix
   */ 
  public function getPrix()
  {
    return $this->prix;
  }

  /**
   * Set the value of prix
   *
   * @return  self
   */ 
  public function setPrix($prix)
  {
    $this->prix = $prix;

    return $this;
  }

  /**
   * Get the value of duree
   */ 
  public function getDuree()
  {
    return $this->duree;
  }

  /**
   * Set the value of duree
   *
   * @return  self
   */ 
  public function setDuree($duree)
  {
    $this->duree = $duree;

    return $this;
  }
}