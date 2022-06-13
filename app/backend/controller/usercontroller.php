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

    public function getUserDetails($email)
    {
        $userDetails = $this->service->searchByEmail($email);
        return $userDetails;
    }

    public function getUserDetailsById($id)
    {
        $userDetails = $this->service->getOneUser($id);
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

        $roleId = 1;

        $select = $this->service->searchByEmail($email);

        if (empty($select)) {
            $count = $this->service->createUser($email, $firstname, $lastname, sha1($password), $roleId);

            if (!empty($email) && !empty($password) && ($password === $confirm_password)) {
                if ($count >= 1) {
                    require __DIR__ . "../../views/cms/login.php";
                } else {
                    require __DIR__ . "../../views/cms/users/register.php";
                }
            }
        } else {
            echo "A user with this email adress is already registered";
        }
    }

    public function addUser()
    {
        $email =  $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password =  $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        $roleId = $_POST['role'];

        $select = $this->service->searchByEmail($email);

        if (empty($select)) {
            $count = $this->service->createUser($email, $firstname, $lastname, sha1($password), $roleId);

            if (!empty($email) && !empty($password) && ($password === $confirm_password)) {
                header('Location: manageUsers');
            }
        } else {
            echo "A user with this email adress is already registered";
        }
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
        require __DIR__ . ('../../views/cms/users/manageUsers.php');
    }

    public function findAllRoles()
    {
        return $listOfRoles = $this->service->getAllRoles();
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
