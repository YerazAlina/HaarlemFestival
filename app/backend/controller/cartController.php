
<?php

require_once __DIR__ . ('../../service/jazzService.php');
require_once __DIR__ . ('../../service/activityService.php');
require_once __DIR__ . ('../../service/foodService.php');



class cartContoller{

    
    private jazzService $jazzservice;
    private activityService $activityservice;
    private foodService $foodservice;


    public function __construct(){
        $this->jazzservice = new jazzService();
        $this->activityservice = new activityService();
        $this->foodservice = new foodService();
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
                case 'clearCart':
                    $this->clearCart();
                    break;      
                case 'updateCart':
                    $this->updateQuantity();
                    break;     
                
            }
        }
    }


    public function addToCart(){

        //unset($_SESSION['cart']);

        // $activityId = null;
        // $cart = null;


        if(!empty($_POST['addTicket'])){

            $activityId = $_POST['addTicket'];
            $getType = $this->activityservice->getType($activityId);

            $type = "";

            foreach($getType as $t){
                $type = $t['type'];
            }

            //printf($type);

            $details = "";

            if($type == "jazz"){

                $details = $this->jazzservice->getOne($activityId);

            }

            else if($type == "Food"){

                $details = $this->foodservice->findById($activityId);

            }

            foreach($details as $detail){

                $cart = array (

                    'name' => $detail['name'],
                    'startTime' => $detail['startTime'],
                    'endTime' => $detail['endTime'],
                    'location' => $detail['locationName'],
                    'date' => $detail['date'],
                    'price' => $detail['price'],
                    'id' => $detail['activityId'],
                    'quantity' => $_POST['addQuantity']
                );
            
            }

            $_SESSION['cart'][] = $cart;

            
          
        }

        require __DIR__ . ('/../views/cart.php');

    }

    
    public function updateQuantity(){

        if(isset($_POST['addQuantity'])){

            $id = $_POST['addQuantity'];
            //$_SESSION['cart'][$id]['quantity'] += 1;
            // $newValue = $_SESSION['cart']['quantity'][$id] ++;
            // array_replace($newValue, $_SESSION['cart'][$id]['quantity']);
            // print($_SESSION['cart'][$id]['quantity']);

           
            foreach($_SESSION['cart'] as $items=>$values){
                if($id == $values['id']){

                    $values['quantity']++;
                    print($values['quantity']);

                    break;
                }
            }

        }

        require __DIR__ . ('/../views/cart.php');
    }



   
   

    public function removeFromCart(){

        // if(isset($_POST['removeTicket'])){
        //     $_SESSION['cart'][] = $cart;

        //     unset($cart[$_POST['removeTicket']]);

        // }

        if(isset($_POST['removeTicket'])){
            $id = $_POST['removeTicket'];

            foreach($_SESSION['cart'] as $items=>$values){
                if($id == $values['id']){
                    unset($_SESSION['cart'][$items]);
                }
            }
        }

       
        
        require __DIR__ . ('/../views/cart.php');
    }


    public function clearCart(){

        unset($_SESSION['cart']);
	    $_SESSION['message'] = 'Cart cleared successfully';
        require __DIR__ . ('/../views/cart.php');

    }

  
   

}