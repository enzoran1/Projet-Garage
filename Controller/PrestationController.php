<?php
namespace App\Controller;

class PrestationController extends Controller
{    
    public function index(){

        $this->render('prestation/index');
        
    }

    public function prestationVue(){
        $this->render('prestation/pneu/montageEquilibrage');
    }
}