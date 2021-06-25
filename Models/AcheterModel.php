<?php

namespace App\Models;

class AcheterModel extends Model
{
  protected $id;
  protected $id_prestation;
  protected $quantite;
  protected $prix;

  public function __construct()
  {
    $this->table = 'acheter';
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
   * Get the value of id_prestation
   */ 
  public function getId_prestation()
  {
    return $this->id_prestation;
  }

  /**
   * Set the value of id_prestation
   *
   * @return  self
   */ 
  public function setId_prestation($id_prestation)
  {
    $this->id_prestation = $id_prestation;

    return $this;
  }

  /**
   * Get the value of quantite
   */ 
  public function getQuantite()
  {
    return $this->quantite;
  }

  /**
   * Set the value of quantite
   *
   * @return  self
   */ 
  public function setQuantite($quantite)
  {
    $this->quantite = $quantite;

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
}
