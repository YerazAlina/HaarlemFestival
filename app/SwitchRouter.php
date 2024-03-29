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









                //Jazz CMS
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
            case 'addArtist':
                require __DIR__ . '/backend/controller/jazzController.php';
                $controller = new jazzController();
                $controller->addArtist();
                $controller->allJazzArtistscms();
                break;
            case 'addEvent':
                require __DIR__ . '/backend/controller/jazzController.php';
                $controller = new jazzController();
                $controller->addEvent();
                $controller->allJazzEventscms();
                break;
            case 'deleteArtist':
                require __DIR__ . '/backend/controller/jazzController.php';
                $controller = new jazzController();
                $controller->deleteArtist();
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
