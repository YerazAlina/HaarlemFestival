<?php
require __DIR__ . ('../../service/UserService.php');

class UserController
{
    private UserService $service;

    public function __construct()
    {
        $this->service = new UserService();
    }

    public function deleteUser($email)
    {
        $this->service->deleteUserByEmail($email);
        header('Location: logoutUser');
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

                    $userInfo = $this->service->searchByEmail($email);

                    $_SESSION['currentUserRole'] = $userInfo->roleId;
                    $_SESSION['userId'] = $userInfo->id;
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
    public function updateAccount($id, $password, $roleId)
    {
        $email =  $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        //$password =  $_POST['password'];

        $count = $this->service->updateUser($id, $email, $firstname, $lastname, $password, $roleId);
        if(! (isset($_SESSION['updateId']))){
            $_SESSION['email'] = $email;
        }

        header('Location: home');
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
        $roles = $this->service->getAllRoles();
        require __DIR__ . ('../../views/cms/users/manageUsers.php');
    }

    public function findAllRoles()
    {
        return $listOfRoles = $this->service->getAllRoles();
    }
}
