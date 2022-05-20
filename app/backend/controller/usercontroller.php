<?php
require __DIR__ . ('../../service/UserService.php');

class UserController
{
    private UserService $service;

    public function __construct()
    {
        $this->service = new UserService();
    }

    public function deleteUser()
    {
        $email = $_SESSION['email'];

        if (isset($_SESSION['email'])) {

            $this->service->deleteUserByEmail($email);
            header('Location: logoutUser');
        }
    }

    public function login()
    {
        $email =  $_POST['email'];
        $password =  $_POST['password'];

        if (isset($_POST["login"])) {
            if (!empty($_POST["email"]) && !empty($_POST['email'])) {

                $_SESSION['email'] = $_POST['email'];

                $count = $this->service->login($email, sha1($password));

                if ($count > 0) {

                    $_SESSION['logged_in'] = true;
                    $_SESSION['firstname'] = 'blabla';
                    $_SESSION['lastname'] = 'blabla';
                    
                    //$user = $this->service->getOneUserByEmail($email);

                    header('Location: home');
                } else {

                    require __DIR__ . "../../views/cms/login.php";
                }
            }
        }
    }

    public function signUp()
    {
        $email =  $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password =  $_POST['password'];

        $confirm_password = $_POST['confirm_password'];

        // A check is performed to see whether a user has registered before using the same email address

        // this checks if the email already exists in the db table users and returns uhhhh something idk what
        //$something = $this->service->searchEmail($email);

        $count = $this->service->createUser($email, $firstname, $lastname, sha1($password));

        if (!empty($email) && !empty($password) && ($password === $confirm_password)) {
            if ($count >= 1) {
                require __DIR__ . "../../views/cms/login.php";
            } else {
                require __DIR__ . "../../views/cms/register.php";
            }
        } else {
            header('Location: register');
        }
    }

    public function updateAccount()
    {
        $email =  $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password =  $_POST['password'];

        $count = $this->service->updateUser($email, $firstname, $lastname, sha1($password));
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        header('Location: login');
    }

    public function allUsers()
    {
        $users = $this->service->getAllUsers();
        require __DIR__ . ('/../views/cms/manageUsers.php');
    }

    public function updateEmail()
    {
        /* $new_email =  $_POST["username_new"];

        if (isset($_POST["email_new"])) {
            if (!empty($_POST["email_new"])) {

                $_SESSION['email'] = $_POST['email_new'];

                $this->service->updateEmail($new_email, 26);
            }
        } */
    }
}
