<?php
namespace App\Models;

class PhotoModel extends Model
{
  protected $id;
  protected $lib_photo;
  protected $id_avendre;

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
   * Get the value of id_avendre
   */ 
  public function getId_avendre()
  {
    return $this->id_avendre;
  }

  /**
   * Set the value of id_avendre
   *
   * @return  self
   */ 
  public function setId_avendre($id_avendre)
  {
    $this->id_avendre = $id_avendre;

    return $this;
  }
}