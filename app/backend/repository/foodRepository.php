<?php

require_once('../db.php');
require_once __DIR__ . ('../../model/activity.php');
require_once __DIR__ . ('../../model/foodActivity.php');
require_once __DIR__ . ('../../model/location.php');

class foodRepository
{
    private DB $db;
    private $stmt;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }


    private string $all_restaurants_sql = "SELECT * FROM restaurant
                                      JOIN activity a on a.id = restaurantActivity.activityId
                                      RIGHT JOIN artist a2 on a2.id = restaurntActivity.artistId
                                      JOIN location l on l.id = a.locationId";


    public function findAll()
    {
        $this->stmt = $this->db->prepare($this->all_restaurants_sql);
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'foodActivity');
        $this->stmt->execute();
        return $this->stmt->fetchAll();
    }
}