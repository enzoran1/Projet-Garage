<?php
namespace App\Models;

class TypeVehiculeModel extends Model
{
 protected $lib_type;
 
  protected $id_type;
  

  public function __construct()
  {
    $this->table = 'type_vehicule';

  }

 /**
  * Get the value of lib_type
  */ 
 public function getLib_type()
 {
  return $this->lib_type;
 }

 /**
  * Set the value of lib_type
  *
  * @return  self
  */ 
 public function setLib_type($lib_type)
 {
  $this->lib_type = $lib_type;

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