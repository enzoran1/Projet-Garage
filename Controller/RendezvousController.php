<?php 

namespace App\Controller;


class RendezvousController extends Controller 
{
    public function index()
    { 
        return $this->render('rendezvous/index');
    }
}