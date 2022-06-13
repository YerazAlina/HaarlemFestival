
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
            $type = $this->activityservice->getType($activityId);

            if($type == "jazz"){

                $details = $this->jazzservice->getOne($activityId);

            }

            else if($type == "food"){

                $details = $this->foodservice->findById($activityId);

            }


            $details = $this->jazzservice->getOne($activityId);
                    
            foreach($details as $detail){

                

                $cart = array (

                    'name' => $detail['artistname'],
                    'startTime' => $detail['startTime'],
                    'endTime' => $detail['endTime'],
                    'location' => $detail['name'],
                    'date' => $detail['date'],
                    'price' => $detail['price'],
                    'id' => $detail['activityId'],
                    'quantity' => $_SESSION['quantity']['id']
    
                );
            
            }

            $_SESSION['cart'][] = $cart;

            
          
        }
        require __DIR__ . ('/../views/cart.php');

    }

    public function updateQuantity(){

        if(isset($_POST['addQuantity'])){

            $id = $_POST['addQuantity'];

            foreach($_SESSION['quantity'] as $items=>$values){
                if($id == $values['id']){
                    $_SESSION['quantity'][$id] + 1;
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