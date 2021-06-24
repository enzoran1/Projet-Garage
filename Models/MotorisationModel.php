<?php
namespace App\Models;

class MotorisationModel extends Model
{
  protected $id;
  protected $lib_motorisation;

  public function __construct()
  {
    $this->table = 'motorisation';
  }

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of lib_motorisation
   *
   * @return  self
   */ 
  public function setLib_motorisation($lib_motorisation)
  {
    $this->lib_motorisation = $lib_motorisation;

    return $this;
  }
}