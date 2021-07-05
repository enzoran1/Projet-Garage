<?php
namespace App\Models;

class VehiculeModel extends Model
{
  protected $id;
  protected $plaque_immatriculation;
  protected $annee;
  protected $km;
  protected $id_marque;
  protected $id_motorisation;
  protected $id_type;
  protected $id_utilisateur;
  

  public function __construct()
  {
    $this->table = 'vehicule';
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

  /**
   * Get the value of id_utilisateur
   */ 
  public function getId_utilisateur()
  {
    return $this->id_utilisateur;
  }

  /**
   * Set the value of id_utilisateur
   *
   * @return  self
   */ 
  public function setId_utilisateur($id_utilisateur)
  {
    $this->id_utilisateur = $id_utilisateur;

    return $this;
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
  }
  

 