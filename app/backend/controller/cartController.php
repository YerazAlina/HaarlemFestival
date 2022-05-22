
<?php

require_once __DIR__ . ('../../service/jazzService.php');

class cartContoller{

    
    private jazzService $jazzservice;


    public function __construct(){
        $this->jazzservice = new jazzService();
    }

    public function run(){
        if(isset($_POST['action'])){
            switch ($_POST['action']) {
                case 'addToCart':
                    $this->addToCart();
                    break;
                case 'removeFromCart':
                    $this->removeFromCart();
                    break;    
                
            }
        }
    }


    public function addToCart(){


        if(!empty($_POST['addTicket'])){

            
            
            $activityId = $_POST['addTicket'];
            $details = $this->jazzservice->getOne($activityId);

            $_SESSION["cart"][$activityId] = $activityId;

            //foreach($details as $detail){
              //  $_SESSION['cart'][] = array('artistname'=> $detail['artistname']);
            //}

           //$_SESSION["cart"][] = array('name'=>$details['artistname']);


            
            /*foreach($details as $d){
          

            $_SESSION["cart"] = [
                $activityId =>[
                    'name': $d['artistname'];
                    'time': $d['startTime']
                ] 
                
                
            ] 

                  
            }*/

            //$name = null;
            //$date = null;

            /*


            foreach($details as $detail){
                $name = $detail['artistname'];
                $date = $detail['date'];

            }

            //$_SESSION["cart"][] = array('name'=>'medon', 'date'=> 'ugh');

            */

        }
       

        require __DIR__ . ('/../views/cart.php');

    }

   

    public function removeFromCart(){

        if(isset($_POST['removeTicket'])){
            $id = $_POST['removeTicket'];
            unset($_SESSION["cart"][$id]);

        }

    
        
        require __DIR__ . ('/../views/cart.php');
    }

  
   

}