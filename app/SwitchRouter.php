<?php

use Mollie\Api\Resources\Issuer;

session_start();

class SwitchRouter
{
    public function route($uri, $method, $body, $path)
    {
        switch ($uri) {
                //login/register/logout
            case '':
            case 'login':
                if (isset($_SESSION['logged_in'])) {
                    echo "You are already logged in";
                } else {
                    require __DIR__ . '/backend/views/cms/login.php';
                }
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
            case 'logoutUser':
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $controller->logout();
                break;








                //personal info
            case 'profile':
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $currentUserDetails = $controller->getUserDetails($_SESSION['email']);

                if ($currentUserDetails->roleId >= 1) {
                    require __DIR__ . '/backend/views/cms/users/profile.php';

                    if (isset($_POST['profile'])) {
                        $controller->updateAccount($currentUserDetails->id, $currentUserDetails->password, $currentUserDetails->roleId);
                    }
                } else {
                    echo 'access denied';
                }

                break;

            case 'updateUser':
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $currentUserDetails = $controller->getUserDetails($_SESSION['email']);
                $controller->updateAccount($currentUserDetails->id, $currentUserDetails->password, $currentUserDetails->roleId);
                break;

            case 'deleteAccount':
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $controller->deleteUser($_SESSION['email']);
                break;
















                //manage users
            case 'manageUsers': //all users 
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $currentUserDetails = $controller->getUserDetails($_SESSION['email']);

                if ($currentUserDetails->roleId >= 2) {
                    $controller->allUsers();
                } else {
                    echo 'access denied';
                }
                break;
            case 'editAccount': //edit
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $_SESSION['updateId'] = $_POST['editAcc'];
                $details = $controller->getUserDetailsById($_SESSION['updateId']);
                require __DIR__ . '/backend/views/cms/users/editaccount.php';
                break;
            case 'updateUserCMS': //edit 
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $details = $controller->getUserDetailsById($_SESSION['updateId']);
                $controller->updateAccount($details->id, $details->password, $details->roleId);
                break;
            case 'registerUseraccount': //add
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $controller->addUser();
                $controller->allUsers();
                break;
            case 'deleteUserCMS':
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $controller->deleteUser($_POST['deleteAccount']);
                break;









                //Jazz Artist CMS 
            case 'artistcms':
                require __DIR__ . '/backend/controller/jazzController.php';
                $controller = new jazzController();
                $controller->allJazzArtistscms();
                break;

            case 'homepage':
                require __DIR__. '/backend/views/homepage.php';
                break;    
            case 'jazz':

            case 'addArtist': //add

                require __DIR__ . '/backend/controller/jazzController.php';
                $controller = new jazzController();
                $controller->addArtist();
                $controller->allJazzArtistscms();
                break;
            case 'editArtist': //edit
                require __DIR__ . '/backend/controller/jazzController.php';
                $controller = new jazzController();
                $_SESSION['updateId'] = $_POST['editArtist'];
                $artist = $controller->getArtist($_SESSION['updateId']);
                require __DIR__ . '/backend/views/cms/jazz/editArtist.php';
                break;
            case 'updateArtistCMS': //edit 
                require __DIR__ . '/backend/controller/jazzController.php';
                $controller = new jazzController();
                $controller->updateArtist($_SESSION['updateId']);
                break;
            case 'deleteArtist': //delete
                require __DIR__ . '/backend/controller/jazzController.php';
                $controller = new jazzController();
                $controller->deleteArtist();
                break;







                //Location CMS 
            case 'locationcms':
                require __DIR__ . '/backend/controller/locationController.php';
                $controller = new LocationController();
                $controller->allLocations();
                break;
            case 'addLocation': //add
                require __DIR__ . '/backend/controller/locationController.php';
                $controller = new LocationController();
                $controller->addLocation();
                $controller->allLocations();
                break;
            case 'editLocation': //edit
                require __DIR__ . '/backend/controller/locationcontroller.php';
                $controller = new LocationController();
                $_SESSION['updateId'] = $_POST['editLocation'];
                $location = $controller->getLocation($_SESSION['updateId']);
                require __DIR__ . '/backend/views/cms/location/editLocation.php';
                break;
            case 'updateLocationCMS': //edit 
                require __DIR__ . '/backend/controller/locationcontroller.php';
                $controller = new LocationController();
                $controller->updateLocation($_SESSION['updateId']);
                header('Location: locationcms');
                break;
            case 'deleteLocation': //delete
                require __DIR__ . '/backend/controller/locationcontroller.php';
                $controller = new LocationController();
                $controller->deleteLocation();
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



                //Jazz Event CMS
            case 'jazzcms':
                require __DIR__ . '/backend/controller/jazzController.php';
                $controller = new jazzController();
                //$controller->allJazzEventscms();
                break;
            case 'addEvent':
                require __DIR__ . '/backend/controller/jazzController.php';
                $controller = new jazzController();
                //$controller->addEvent();
                //$controller->allJazzEventscms();

                break;
            case 'purchase':
                require __DIR__ . '/backend/controller/orderController.php';  
                $controller = new orderController();
                $controller->purchase();
                break;
            case 'confirmation':
                require __DIR__ . '/backend/views/confirmation.php';  
                break;



                //JUST VIEWS
            case 'home':
                require __DIR__ . '/backend/views/cms/home.php';
                break;
            case 'foodcms':
                require __DIR__ . '/backend/views/cms/restaurants/foodcms.php';
                break;
            case 'addArtistView':
                require __DIR__ . '/backend/views/cms/jazz/addArtist.php';
                break;
            case 'addEventView':
                require __DIR__ . '/backend/views/cms/jazz/addEvent.php';
                break;
            case 'addLocationView':
                require __DIR__ . '/backend/views/cms/location/addLocation.php';
                break;
            case 'register':
                require __DIR__ . '/backend/views/cms/users/register.php';
                break;
            case 'createUser':
                //for creating a new user account as superadminuser
                require __DIR__ . '/backend/views/cms/users/createuser.php';
                break;
            case 'manageContent':
                require __DIR__ . '/backend/views/cms/manageContent.php';
                break;

            default:

                echo '404 not found';
                http_response_code(404);
        }
    }
}
