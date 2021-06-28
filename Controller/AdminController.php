<?php
namespace App\Controller;

class AdminController extends Controller
{
  public function index()
  {
    return $this->render('admin/index');
  }
}