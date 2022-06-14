<?php

require_once __DIR__ . ('../../../db.php');
require_once __DIR__ . ('/Repository.php');

class LocationRepository extends Repository
{
    public DB $db;
    public $stmt;

    //sql statements 
    private string $all_locations_sql = "SELECT * FROM location";
    // private string $all_roles_sql = "SELECT * FROM roles";
    // private string $create_user_sql = "insert into users (id, email, firstname, lastname, password) values (null, :email, :firstname, :lastname, :password, )";  //change this one
    // private string $delete_user_sql = "delete from users where email = :email";
    // private string $one_user_sql = "SELECT * from users where id = :id";
    // private string $one_userByEmail_sql = "SELECT * from users where email = :email";

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function findAll()
    {
        $this->stmt = $this->db->prepare($this->all_locations_sql);
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'location');
        $this->stmt->execute();
        return $this->stmt->fetchAll();
    }

    public function findById($id)
    {
        //todo
    }

    public function saveOne($object)
    {
       //todo
    }

    public function deleteOne($id)
    {
        //todo
    }
}