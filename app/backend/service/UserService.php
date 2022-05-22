<?php
require_once __DIR__ . ('../../model/User.php');
require_once __DIR__ . ('../../repository/UserRepository.php');

class UserService
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function getAllUsers()
    {
        return $this->userRepository->findAll();
    }

    public function createUser($email, $firstname, $lastname ,$password, $roleId)
    {
        return $this->userRepository->addUser($email, $firstname, $lastname ,$password, $roleId);
    }

    public function deleteUser($id)
    {
        return $this->userRepository->deleteOne($id);
    }

    public function deleteUserByEmail($email)
    {
        return $this->userRepository->deleteUserByEmail($email);
    }

    public function getOneUser($id)
    {
        return $this->userRepository->findById($id);
    }

    public function updateEmail($email, $id)
    {
        return $this->userRepository->updateEmail($email, $id);
    }

    //new
    public function updateUser($id, $email)
    {
        return $this->userRepository->updateUser($id, $email);
    }

    public function searchByEmail($email)
    {
        return $this->userRepository->findByEmail($email);
    }

    public function login($email, $password)
    {
        return $this->userRepository->login($email, $password);
    }
}
