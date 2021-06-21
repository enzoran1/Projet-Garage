<?php

class PrestationController extends AbstractController
{    

    public function index()
    {
        return $this->renderView('prestation/index.php');
    }
}