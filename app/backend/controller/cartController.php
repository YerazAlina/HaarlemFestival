
<?php

class cartController{

    public function index(){

        if(!isset($_SESSION['tickets'])){
            $_SESSION['tickets'] = array();

        }

    }


    public functionn getCartTickets(){
        $tickets = array();

        foreach($_SESSION['tickets'] as $key => $value){
            $ticket = 
        }
    }
}