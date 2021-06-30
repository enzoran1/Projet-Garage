<?php
namespace App\Models;

class MarqueModel extends Model
{
  protected $id;
  protected $nom;

  public function __construct()
  {
    $this->table = 'marque';
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

  // par ordre alphabétique
  public function findAllOrdre()
  {
    $query = $this->requete('SELECT * FROM marque order by nom asc');
    return $query->fetchAll();
  }
}