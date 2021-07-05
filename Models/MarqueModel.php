<?php
namespace App\Models;

class MarqueModel extends Model
{
  protected $id;
  protected $lib_marque;

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


  // par ordre alphabétique
  public function findAllOrdre()
  {
    $query = $this->requete('SELECT * FROM marque order by lib_marque asc');
    return $query->fetchAll();
  }

  /**
   * Get the value of lib_marque
   */ 
  public function getLib_marque()
  {
    return $this->lib_marque;
  }

  /**
   * Set the value of lib_marque
   *
   * @return  self
   */ 
  public function setLib_marque($lib_marque)
  {
    $this->lib_marque = $lib_marque;

    return $this;
  }
}