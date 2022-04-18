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
            case 'register':
                require __DIR__ . '/backend/views/cms/register.php';
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
            case 'profile':
                require __DIR__ . '/backend/views/cms/profile.php';
                break;
            case 'manageUsers':
                require __DIR__ . '/backend/views/cms/manageUsers.php';
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
