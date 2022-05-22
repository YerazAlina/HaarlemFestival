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

    public function getUserDetails(){
        $email = $_SESSION['email'];
        $userDetails = $this->service->searchByEmail($email);

        return $userDetails;
    }

    public function login()
    {
        $email =  $_POST['email'];
        $password =  $_POST['password'];

        if (isset($_POST["login"])) {
            if (!empty($_POST["email"]) && !empty($_POST['email'])) {

                $_SESSION['email'] = $_POST['email'];

                $user = $this->service->login($email, sha1($password));

                if (!empty($user)) {

                    $_SESSION['logged_in'] = true;

                    //$email2 = $user['email'];

                    //echo $user;
                    //echo implode(" ",$user); // this prints array wtf . WHYYYYYYY
                    //$password = $user['password'];

                    // $current_user = $this->service->searchByEmail($email);
                    // $email = $current_user->getEmail();
                    // echo $email;


                    // $_SESSION['id'] = $count; //not correct, count is always 1

                    // $_SESSION['firstname'] = 'blabla';
                    // $_SESSION['lastname'] = 'blabla';

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

        $roleId = 0;

        // A check is performed to see whether a user has registered before using the same email address

        // this checks if the email already exists in the db table users and returns uhhhh something idk what
        //$something = $this->service->searchEmail($email);

        $count = $this->service->createUser($email, $firstname, $lastname, sha1($password), $roleId);

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

    public function addUser()
    {
        $email =  $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password =  $_POST['password'];

        $confirm_password = $_POST['confirm_password'];

        $roleId = 0;

        // A check is performed to see whether a user has registered before using the same email address

        // this checks if the email already exists in the db table users and returns uhhhh something idk what
        //$something = $this->service->searchEmail($email);

        $count = $this->service->createUser($email, $firstname, $lastname, sha1($password), $roleId);
    }

    //new
    public function updateAccount()
    {
        $id =  1;
        $email =  $_POST['email'];
        //$firstname = $_POST['firstname'];
        //$lastname = $_POST['lastname'];
        //$password =  $_POST['password'];

        $count = $this->service->updateUser($id, $email);
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
