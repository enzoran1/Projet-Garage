<?php

namespace App\Models;

class PanierModel extends Model
{
  protected $id;
  protected $date_panier;
  protected $date_validation;
  protected $id_a_reparer;

  public function __construct()
  {
    $this->table = 'panier';
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of date_panier
   */
  public function getDate_panier()
  {
    return $this->date_panier;
  }

  /**
   * Set the value of date_panier
   *
   * @return  self
   */
  public function setDate_panier($date_panier)
  {
    $this->date_panier = $date_panier;

    return $this;
  }

  /**
   * Get the value of date_validation
   */
  public function getDate_validation()
  {
    return $this->date_validation;
  }

  /**
   * Set the value of date_validation
   *
   * @return  self
   */
  public function setDate_validation($date_validation)
  {
    $this->date_validation = $date_validation;

    return $this;
  }

  /**
   * Get the value of id_a_reparer
   */
  public function getId_a_reparer()
  {
    return $this->id_a_reparer;
  }

  /**
   * Set the value of id_a_reparer
   *
   * @return  self
   */
  public function setId_a_reparer($id_a_reparer)
  {
    $this->id_a_reparer = $id_a_reparer;

    return $this;
  }
}
