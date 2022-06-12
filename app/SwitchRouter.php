<?php

session_start();

class SwitchRouter
{
    public function route($uri, $method, $body, $path)
    {
        switch ($uri) {
            case '':
            case 'login':
                require __DIR__ . '/backend/views/cms/login.php';
                break;
            case 'test':
                require __DIR__ . '/backend/views/cms/jazz/test.php';
                break;
            case 'home':
                require __DIR__ . '/backend/views/cms/home.php';
                break;
            case 'foodcms':
                require __DIR__ . '/backend/views/cms/restaurants/foodcms.php';
                break;
            case 'jazzcms':
                require __DIR__ . '/backend/controller/jazzController.php';
                $controller = new jazzController();
                $controller->allJazzEventscms();
                break;
            case 'artistcms':
                require __DIR__ . '/backend/controller/jazzController.php';
                $controller = new jazzController();
                $controller->allJazzArtistscms();
                break;
            case 'addArtistView':
                require __DIR__ . '/backend/views/cms/jazz/addArtist.php';
                break;
            case 'addEventView':
                require __DIR__ . '/backend/views/cms/jazz/addEvent.php';
                break;
            case 'register':
                require __DIR__ . '/backend/views/cms/users/register.php';
                break;
            case 'createUser':
                //for creating a new user account as superadminuser
                require __DIR__ . '/backend/views/cms/users/createuser.php';
                break;
            case 'loginUser':
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $controller->login();
                break;
            case 'registerUser':
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $controller->signUp();
                break;
            case 'registerUseraccount':
                //for creating a new user account as superadminuser
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $controller->addUser();
                $controller->allUsers();
                break;
            case 'addArtist':
                //add artist to db
                require __DIR__ . '/backend/controller/jazzController.php';
                $controller = new jazzController();
                $controller->addArtist();
                $controller->allJazzArtistscms();
                break;
            case 'logoutUser':
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $controller->logout();
                break;
            case 'profile':
                //only alowed for users
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $currentUserDetails = $controller->getUserDetails($_SESSION['email']);
                if ($currentUserDetails->roleId >= 1) {
                    require __DIR__ . '/backend/views/cms/users/profile.php';
                } else {
                    echo 'access denied'; //TODO:CHANGE THIS 
                }
                break;
            case 'editAccount':
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $userDetails = $controller->getUserDetailsById($_POST['editAccount']);
                require __DIR__ . '/backend/views/cms/users/editaccount.php';
                break;
            case 'manageUsers':
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $controller->allUsers();
                break;
            case 'manageContent':
                require __DIR__ . '/backend/views/cms/manageContent.php';
                break;
            case 'deleteAccount':
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $controller->deleteUser();
                break;
            case 'deleteArtist':
                require __DIR__ . '/backend/controller/jazzController.php';
                $controller = new jazzController();
                //$controller->deleteArtist();
                break;
            case 'saveChanges':
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $controller->updateAccount();
            case 'jazzevents':
                require __DIR__ . '/backend/controller/jazzController.php';
                $controller = new jazzController();
                $controller->allJazzEvents();

                //$controller = new cartController();
                //$controller->index();
                break;

            case 'food':
                require __DIR__ . '/backend/controller/foodController.php';
                $controller = new foodController();
                $controller->allfoodRestaurant();

                // $controller = new cartController();
                // $controller->index();
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
                $controller = new cartContoller();
                $controller->addToCart();
                break;
            case 'jazzevents':
                require __DIR__ . '/backend/controller/jazzController.php';
                $controller = new jazzController();
                $controller->allJazzEvents();

                //frequire __DIR__ . '/backend/controller/cartController.php';
                //$controller = new cartController();
                //$controller->index();
                break;
            case 'cart':
                require __DIR__ . '/backend/controller/cartController.php';
                $controller = new cartContoller();
                $controller->addToCart();
                break;
            default:
                echo '404 not found';
                http_response_code(404);
        }
    }
}
