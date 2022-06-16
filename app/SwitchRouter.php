<?php

session_start();

class SwitchRouter
{
    public function route($uri, $method, $body, $path)
    {
        switch ($uri) {
            case '':
                break;
            case 'jazzevents':
                require __DIR__ . '/backend/controller/jazzController.php';
                $controller = new jazzController();
                $controller->allJazzEvents();

                $controller = new cartController();
                $controller->index();
                break;

            case 'food':
                require __DIR__ . '/backend/controller/foodController.php';
                $controller = new foodController();
                $controller->allfoodRestaurant();
    
                $controller = new cartController();
                $controller->index();
                break;

            case 'foodReservation':
                require __DIR__ . '/backend/controller/foodController.php';
                
                $controller = new foodController();
                $restaurant = $controller->getRestaurantById();

                //require __DIR__ . '/backend/controller/cartController.php';
                //$controller = new cartController();
               // $controller->index();
                break;

            case 'cart':
                require __DIR__ . '/backend/controller/cartController.php';  
                $controller = new cartController();

                if(isset($_POST['addTicket'])){
                    $_POST['action'] = "addToCart";

                }elseif(isset($_POST['removeTicket'])){
                    $_POST['action'] = "removeFromCart";
                    
                }elseif(isset($_POST['addQuantity']) || isset($_POST['subtractQuantity']) ){
                    $_POST['action'] = "updateCart";
                }
                elseif(isset($_POST['clearCart'])){
                    $_POST['action'] = "clearCart";
                }
                else{

                    $_POST['action'] = "displayPage";

                }
                $controller->run();
                //require __DIR__ . '/backend/views/cart.php';  

                break;
            case 'purchase':
                require __DIR__ . '/backend/controller/orderController.php';  
                $controller = new orderController();
                $controller->purchase();
                break;
            case 'confirmation':
                require __DIR__ . '/backend/views/confirmation.php';  
               
                break;

            default:

                echo '404 not found';
                http_response_code(404);
        }
    }
}
