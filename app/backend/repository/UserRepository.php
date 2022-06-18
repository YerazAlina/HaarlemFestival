<?php

require_once __DIR__ . ('../../../db.php');
require_once __DIR__ . ('/Repository.php');

class UserRepository extends Repository
{
    public DB $db;
    public $stmt;

    //sql statements 
    private string $all_users_sql = "SELECT * FROM users";
    private string $all_roles_sql = "SELECT * FROM roles";
    private string $create_user_sql = "insert into users (id, email, firstname, lastname, password) values (null, :email, :firstname, :lastname, :password, )";  //change this one
    private string $delete_user_sql = "delete from users where email = :email";
    private string $one_user_sql = "SELECT * from users where id = :id";
    private string $one_userByEmail_sql = "SELECT * from users where email = :email";

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function findAll()
    {
        $this->stmt = $this->db->prepare($this->all_users_sql);
        $this->stmt->execute();

        return $this->stmt->fetchAll();
    }

    public function findAllRoles()
    {
        $this->stmt = $this->db->prepare($this->all_roles_sql);
        $this->stmt->execute();

        return $this->stmt->fetchAll();
    }

    public function findByEmail($email)
    {
        $this->stmt = $this->db->prepare($this->one_userByEmail_sql);
        $this->stmt->bindParam(':email', $email);
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $this->stmt->execute();

        return $this->stmt->fetch();
    }

    public function findById($id)
    {
        $this->stmt = $this->db->prepare($this->one_user_sql);
        $this->stmt->bindParam(':id', $id);
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $this->stmt->execute();

        return $this->stmt->fetch();
    }

    public function saveOne($data)
    {
        $this->stmt = $this->db->prepare($this->create_user_sql);
        return $this->stmt->execute($data) ?? false;
    }

    public function deleteOne($id)
    {
        $this->stmt = $this->db->prepare($this->delete_user_sql);
        $this->stmt->bindParam(':id', $id);

        return $this->stmt->execute();
    }

    public function deleteUserByEmail($email)
    {
        $this->stmt = $this->db->prepare($this->delete_user_sql);
        $this->stmt->bindParam(':email', $email);

        return $this->stmt->execute();
    }

    public function login($email, $password)
    {
        //$count = "";

        $query = "SELECT * FROM users WHERE email =:email AND password =:password";
        $statement = $this->db->prepare($query);
        $statement->execute(
            array(
                'email'        =>     $email,
                'password'     =>     $password
            )
        );

        return $statement->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function addUser($email, $firstname, $lastname, $password, $roleId)
    {
        $count = "";

        $query = "INSERT INTO users (email, firstname, lastname, password, roleId) VALUES (:email, :firstname, :lastname, :password, :roleId)";
        $statement = $this->db->prepare($query);
        $statement->execute(
            array(
                'email'        =>     $email,
                'firstname'    =>     $firstname,
                'lastname'     =>     $lastname,
                'password'     =>     $password,
                'roleId'       =>     $roleId
            )
        );

        $count = $statement->rowCount();

        return $count;
    }

    public function updateUser($id, $email, $firstname, $lastname, $password, $roleId)
    {
        //UPDATE users SET email = :email, firstname = :firstname WHERE id = 1;
        //TODO: IMPLEMENT 

        //$query = "UPDATE users SET (email, firstname, lastname, password) VALUES (:email, :firstname, :lastname, :password) WHERE id = :id;";
        $query = "UPDATE users SET email=:email, firstname=:firstname, lastname=:lastname, password=:password, roleId=:roleId WHERE id = :id;";
        $statement = $this->db->prepare($query);
        $statement->execute(
            array(
                'id'           =>     $id,
                'email'        =>     $email,
                'firstname'    =>     $firstname,
                'lastname'     =>     $lastname,
                'password'     =>     $password,
                'roleId'       =>     $roleId
            )
        );

        $count = $statement->rowCount();
    }
}
