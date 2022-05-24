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

            // case 'foodReservation':
            //     require __DIR__ . '/backend/controller/foodController.php';
            //     $controller = new foodController();
            //     $controller->allfoodRestaurant();
        
            //     $controller = new cartController();
            //     $controller->index();
            //     break;

            case 'cart':
                require __DIR__ . '/backend/controller/cartController.php';  
                $controller = new cartController();
                $controller->getCartTickets();


            default:
                echo '404 not found';
                http_response_code(404);
        }
    }
}
