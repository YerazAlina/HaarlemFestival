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
                $controller = new cartContoller();

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
                
                $controller->run();

                break;


            default:
                echo '404 not found';
                http_response_code(404);
        }
    }
}
