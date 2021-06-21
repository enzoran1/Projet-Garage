<?php 

class AchatController extends AbstractController 
{ 
    public function index()
    { 
        return $this->renderView('achat/index.php');
    }
}