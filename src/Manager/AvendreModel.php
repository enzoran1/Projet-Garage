<?php

use App\src\Manager\Model;

class AvendreModel extends Model
{
  protected $id;
  protected $prix;
  protected $description;
  protected $plaque_immatriculation;
  protected $annee;
  protected $km;
  protected $id_modele;
  protected $id_motorisation;
  protected $id_type;

  public function __construct()
  {
    $this->table = 'a_vendre';
  }
  

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
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
   * Get the value of description
   */ 
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * Set the value of description
   *
   * @return  self
   */ 
  public function setDescription($description)
  {
    $this->description = $description;

    return $this;
  }

  /**
   * Get the value of plaque_immatriculation
   */ 
  public function getPlaque_immatriculation()
  {
    return $this->plaque_immatriculation;
  }

  /**
   * Set the value of plaque_immatriculation
   *
   * @return  self
   */ 
  public function setPlaque_immatriculation($plaque_immatriculation)
  {
    $this->plaque_immatriculation = $plaque_immatriculation;

    return $this;
  }

  /**
   * Get the value of annee
   */ 
  public function getAnnee()
  {
    return $this->annee;
  }

  /**
   * Set the value of annee
   *
   * @return  self
   */ 
  public function setAnnee($annee)
  {
    $this->annee = $annee;

    return $this;
  }

  /**
   * Get the value of km
   */ 
  public function getKm()
  {
    return $this->km;
  }

  /**
   * Set the value of km
   *
   * @return  self
   */ 
  public function setKm($km)
  {
    $this->km = $km;

    return $this;
  }

  /**
   * Get the value of id_modele
   */ 
  public function getId_modele()
  {
    return $this->id_modele;
  }

  /**
   * Set the value of id_modele
   *
   * @return  self
   */ 
  public function setId_modele($id_modele)
  {
    $this->id_modele = $id_modele;

    return $this;
  }

  /**
   * Get the value of id_motorisation
   */ 
  public function getId_motorisation()
  {
    return $this->id_motorisation;
  }

  /**
   * Set the value of id_motorisation
   *
   * @return  self
   */ 
  public function setId_motorisation($id_motorisation)
  {
    $this->id_motorisation = $id_motorisation;

    return $this;
  }

  /**
   * Get the value of id_type
   */ 
  public function getId_type()
  {
    return $this->id_type;
  }

  /**
   * Set the value of id_type
   *
   * @return  self
   */ 
  public function setId_type($id_type)
  {
    $this->id_type = $id_type;

    return $this;
  }
}