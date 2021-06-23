<?php

use App\Controller\MainController;

class AchatController extends MainController 
{ 
    public function index()
    { 
        return $this->render('achat/index.php');
    }
}