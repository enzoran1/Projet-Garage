<?php
namespace App\Models;

class PhotoModel extends Model
{
  protected $id;
  protected $lib_photo;
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
  public function getLib_photo()
  {
    return $this->lib_photo;
  }

  /**
   * Set the value of nom
   *
   * @return  self
   */ 
  public function setLib_photo($lib_photo)
  {
    $this->lib_photo = $lib_photo;

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