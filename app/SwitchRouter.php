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
            case 'home':
                require __DIR__ . '/backend/views/cms/home.php';
                break;
            case 'foodcms':
                require __DIR__ . '/backend/views/cms/foodcms.php';
                break;
            case 'jazzcms':
                require __DIR__ . '/backend/views/cms/jazzcms.php';
                break;
            case 'historycms':
                require __DIR__ . '/backend/views/cms/historycms.php';
                break;
            case 'register':
                require __DIR__ . '/backend/views/cms/register.php';
                break;
            case 'createUser':
                //for creating a new user account as superadminuser
                require __DIR__ . '/backend/views/cms/createuser.php';
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
            case 'logoutUser':
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $controller->logout();
                break;
            case 'profile':
                //require __DIR__ . '/backend/views/cms/profile.php';
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $userDetails = $controller->getUserDetails($_SESSION['email']);
                require __DIR__ . '/backend/views/cms/profile.php';
                break;
            case 'editAccount':
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $userDetails = $controller->getUserDetailsById();
                require __DIR__ . '/backend/views/cms/editaccount.php';
                break;
            case 'manageUsers':
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $controller->allUsers();
                break;
            case 'deleteAccount':
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $controller->deleteUser();
                break;
            case 'saveChanges':
                require __DIR__ . '/backend/controller/usercontroller.php';
                $controller = new UserController();
                $controller->updateAccount();
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
