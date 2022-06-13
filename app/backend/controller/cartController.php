
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
                case 'clearCart':
                    $this->clearCart();
                    break;       
                
            }
        }
    }


    public function addToCart(){

        //unset($_SESSION['cart']);

        $activityId = null;
       
       

        if(!empty($_POST['addTicket'])){

            
            
            $activityId = $_POST['addTicket'];
            $details = $this->jazzservice->getOne($activityId);

            foreach($details as $detail){

                $cart = array (

                    'name' => $detail['artistname'],
                    'startTime' => $detail['startTime'],
                    'endTime' => $detail['endTime'],
                    'location' => $detail['name'],
                    'date' => $detail['date'],
                    'price' => $detail['price'],
                    'id' => $detail['activityId']
    
                );
               
            }

            $_SESSION['cart'][] = $cart;
          
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