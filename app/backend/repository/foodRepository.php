<?php

require_once('../db.php');
require_once __DIR__ . ('../../model/activity.php');
require_once __DIR__ . ('../../model/foodActivity.php');
require_once __DIR__ . ('../../model/restaurant.php');
require_once __DIR__ . ('../../model/restaurantTypelink.php');
require_once __DIR__ . ('../../model/restaurantType.php');
require_once __DIR__ . ('../../model/location.php');

class foodRepository
{
    private DB $db;
    private $stmt;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }


    // private string $all_restaurants_sql = "SELECT a.id, r.name, r.description, r.stars, r.seats, r.phoneNumber, r.price, r.parking, r.website, r.menu, r.contact, a.date, a.startTime, a.endTime, l.address, l.postalCode
    //                                     FROM activity AS a 
    //                                     JOIN location AS l ON a.locationId=l.id
    //                                     JOIN foodActivity AS f ON f.activityId=a.id
    //                                     RIGHT JOIN restaurant AS r ON r.id=f.restaurantId";

    private string $all_restaurants_sql = "SELECT f.activityId, r.id, r.name, r.description, r.stars, r.seats, r.phoneNumber, r.price, r.parking, r.website, r.menu, r.contact, l.address, l.postalCode
                                        FROM restaurant AS r 
                                        JOIN foodActivity AS f ON f.restaurantId=r.id
                                        JOIN location AS l ON r.locationId=l.id
                                        WHERE f.activityId=25 OR 
                                        	f.activityId=37 OR 
                                            f.activityId=49 OR 
                                            f.activityId=57 OR 
                                            f.activityId=69 OR 
                                            f.activityId=81 OR 
                                            f.activityId=93 OR 
                                            f.activityId=105";

    //private string $all_restaurants_sql = "SELECT * FROM restaurant";

    
    private string $get_one_event_sql = "SELECT r.id, r.name, r.description, r.stars, r.seats, r.phoneNumber, r.price, r.parking, r.website, r.menu, r.contact, a.date, a.startTime, a.endTime, l.address, l.postalCode   
                                        FROM activity AS a 
                                        INNER JOIN location AS l ON a.locationId=l.id 
                                        INNER JOIN foodActivity AS f ON f.activityId=a.id 
                                        INNER JOIN restaurant AS r ON r.id=f.restaurantId 
                                        WHERE f.activityId=:id";


    public function findAll()
    {
        $this->stmt = $this->db->prepare($this->all_restaurants_sql);
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'foodActivity');
        $this->stmt->execute();
        return $this->stmt->fetchAll();
    }

   

    public function findEvents(){

        /*
        if(isset($_POST["thursdayEvents"])){
            $this->stmt = $this->db->prepare($this->thursday_events);

        }
        elseif (isset($_POST["fridayEvents"])){
            $this->stmt = $this->db->prepare($this->friday_events);
        }
        elseif (isset($_POST["saturdayEvents"])){
            $this->stmt = $this->db->prepare($this->saturday_events);
        }
        elseif (isset($_POST["sundayEvents"])){
            $this->stmt = $this->db->prepare($this->sunday_events);
        }
        else{
            $this->stmt = $this->db->prepare($this->all_events_sql);
        }
        */

        $this->stmt = $this->db->prepare($this->all_events_sql);
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'foodActivity');
        $this->stmt->execute();
        return $this->stmt->rowCount();
    }

    public function purchaseTicket(){

        if(isset($_POST['activityId'])){
            $result = 'kio';
        }
    }

    public function findById($id)
    {
        $this->stmt = $this->db->prepare($this->get_one_event_sql);
        $this->stmt->execute([':id' => $id]);

        if ($this->stmt->rowCount() > 0) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    public function saveOne($object)
    {
        // TODO: Implement saveOne() method.
    }

    public function deleteOne($id)
    {
        // TODO: Implement deleteOne() method.
    }
}