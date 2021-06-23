<?php

namespace App\src\Manager;

use App\Models\Model;

class Avendre extends Model
{
  public function __construct()
  {
    $this->table = 'vehicule';
    $this->table->findAll();
  }
}