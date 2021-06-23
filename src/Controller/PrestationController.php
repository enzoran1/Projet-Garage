<?php

use App\Controller\MainController;

class PrestationController extends MainController
{    
    public function index()
    {
        return $this->render('prestation/index.php');
    }
}