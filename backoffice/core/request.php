<?php 
class Request{

   public $url; //url appelé par 'lutilisateur

    function __construct(){
        $this->url = $_SERVER['REQUEST_URI'];
    
    }
    

}




