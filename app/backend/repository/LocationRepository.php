<?php

require_once __DIR__ . ('../../../db.php');
require_once __DIR__ . ('/Repository.php');

class LocationRepository extends Repository
{
    public DB $db;
    public $stmt;

    //sql statements 
    private string $all_locations_sql = "SELECT * FROM location";
    private string $delete_location_sql = "DELETE from location where id = :id";
    private string $one_location_sql = "SELECT * from location where id = :id";

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
        $this->stmt = $this->db->prepare($this->one_location_sql);
        $this->stmt->bindParam(':id', $id);
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'location');
        $this->stmt->execute();

        return $this->stmt->fetch();
    }

    public function saveOne($object)
    {
       //todo
    }

    public function deleteOne($id)
    {
        $this->stmt = $this->db->prepare($this->delete_location_sql);
        $this->stmt->bindParam(':id', $id);

        return $this->stmt->execute();
    }

    public function updateLocation($id, $locationName, $address, $postalCode, $city, $capacity)
    {
        $query = "UPDATE location SET locationName=:locationName, address=:address, postalCode=:postalCode, city=:city, capacity=:capacity WHERE id = :id;";
        $statement = $this->db->prepare($query);
        $statement->execute(
            array(
                'id'                 =>     $id,
                'locationName'       =>     $locationName,
                'address'            =>     $address,
                'postalCode'         =>     $postalCode,
                'city'               =>     $city,
                'capacity'           =>     $capacity
            )
        );

        $count = $statement->rowCount();
    }

    public function addLocation($locationName, $address, $postalCode, $city, $capacity)
    {
        $count = "";

        $query = "INSERT INTO location (locationName, address, postalCode, city, capacity) VALUES (:locationName, :address, :postalCode, :city, :capacity)";
        $statement = $this->db->prepare($query);
        $statement->execute(
            array(
                'locationName'       =>     $locationName,
                'address'            =>     $address,
                'postalCode'         =>     $postalCode,
                'city'               =>     $city,
                'capacity'           =>     $capacity
            )
        );

        $count = $statement->rowCount();

        return $count;
    }
}