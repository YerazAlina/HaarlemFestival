<?php

require_once('../db.php');
require_once __DIR__ . ('../../model/artist.php');
require_once __DIR__ . ('../../model/activity.php');
require_once __DIR__ . ('../../model/jazzActivity.php');
require_once __DIR__ . ('../../model/location.php');

class jazzRepository
{

    private DB $db;
    private $stmt;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    private string $all_events_sql = "SELECT * FROM jazzActivity

                                      JOIN activity a on a.id = jazzActivity.activityId

                                      JOIN activity a on a.id = jazzActivity.activityId AND a.date

                                      RIGHT JOIN artist a2 on a2.id = jazzActivity.artistId
                                      JOIN location l on l.id = a.locationId";                         

    private string $get_one_event_sql = "SELECT * FROM jazzActivity
                                        JOIN activity a on a.id = jazzActivity.activityId AND jazzActivity.activityId=:id
                                        RIGHT JOIN artist a2 on a2.id = jazzActivity.artistId
                                        JOIN location l on l.id = a.locationId";

    private string $all_artists_sql = "SELECT * FROM artist";

    private string $delete_artist_sql = "delete from artist where id = :id";

    private string $get_one_artist_sql = "SELECT * FROM artist WHERE id=:id";

    private string $thursday_events = "SELECT * FROM jazzActivity
                                      JOIN activity a on a.id = jazzActivity.activityId AND a.date = '2022-07-28'
                                      RIGHT JOIN artist a2 on a2.id = jazzActivity.artistId
                                      JOIN location l on l.id = a.locationId";

    private string $friday_events = "SELECT * FROM jazzActivity
                                      JOIN activity a on a.id = jazzActivity.activityId AND a.date = '2022-07-29'
                                      RIGHT JOIN artist a2 on a2.id = jazzActivity.artistId
                                      JOIN location l on l.id = a.locationId";

    private string $saturday_events = "SELECT * FROM jazzActivity
                                      JOIN activity a on a.id = jazzActivity.activityId AND a.date = '2022-07-30'
                                      RIGHT JOIN artist a2 on a2.id = jazzActivity.artistId
                                      JOIN location l on l.id = a.locationId";

    private string $sunday_events = "SELECT * FROM jazzActivity
                                      JOIN activity a on a.id = jazzActivity.activityId AND a.date = '2022-07-31'
                                      RIGHT JOIN artist a2 on a2.id = jazzActivity.artistId
                                      JOIN location l on l.id = a.locationId";
    

    public function findAll()
    {
        $this->stmt = $this->db->prepare($this->all_events_sql);
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'jazzActivity');
        $this->stmt->execute();
        return $this->stmt->fetchAll();
    }

    public function getThursdayEvents(){
        $this->stmt = $this->db->prepare($this->thursday_events);
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'jazzActivity');
        $this->stmt->execute();
        return $this->stmt->fetchAll();

    }

    public function getFridayEvents(){
        $this->stmt = $this->db->prepare($this->friday_events);
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'jazzActivity');
        $this->stmt->execute();
        return $this->stmt->fetchAll();

    }

    public function getSaturdayEvents(){
        $this->stmt = $this->db->prepare($this->saturday_events);
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'jazzActivity');
        $this->stmt->execute();
        return $this->stmt->fetchAll();

    }

    public function getSundayEvents(){
        $this->stmt = $this->db->prepare($this->sunday_events);
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'jazzActivity');
        $this->stmt->execute();
        return $this->stmt->fetchAll();

    }


    public function findAllArtists()
    {
        $this->stmt = $this->db->prepare($this->all_artists_sql);
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'artist');
        $this->stmt->execute();
        return $this->stmt->fetchAll();
    }

    public function findEvents()
    {

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
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'jazzactivity');
        $this->stmt->execute();
        return $this->stmt->rowCount();
    }



    public function findById($id)
    {
        /*
        $this->stmt = $this->db->prepare($this->get_one_event_sql);
        $this->stmt->bindParam(':activityId', $id);
        $this->stmt->execute();

        if ($this->stmt->rowCount() > 0) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return null;
        }

        */

        $this->stmt = $this->db->prepare($this->get_one_event_sql);
        $this->stmt->execute([':id' => $id]);

        if ($this->stmt->rowCount() > 0) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    public function findByIdArtist($id)
    {
        $this->stmt = $this->db->prepare($this->get_one_artist_sql);
        $this->stmt->bindParam(':id', $id);
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'artist');
        $this->stmt->execute();

        return $this->stmt->fetch();
    }

    public function saveOne($object)
    {
        // TODO: Implement saveOne() method.
    }

    public function deleteOne($id)
    {
        $this->stmt = $this->db->prepare($this->delete_artist_sql);
        $this->stmt->bindParam(':id', $id);

        return $this->stmt->execute();
    }

    public function addArtist($name, $description)
    {
        $count = "";

        //INSERT INTO `artist`(`id`, `artistname`, `description`) VALUES ([value-1],[value-2],[value-3])
        $query = "INSERT INTO artist (name, description) VALUES (:name, :description)";
        $statement = $this->db->prepare($query);
        $statement->execute(
            array(
                'name'              =>     $name,
                'description'       =>     $description
            )
        );

        $count = $statement->rowCount();

        return $count;
    }

    public function addEvent($type, $date, $startTime, $endTime, $locationId, $price, $ticketsLeft)
    {
        $count = "";

        // INSERT INTO `activity`(`id`, `type`, `date`, `startTime`, `endTime`, `locationId`, `price`, `ticketsLeft`)

        $query = "INSERT INTO activity (type, date, startTime, endTime, locationId, price, ticketsLeft) VALUES (:type, :date, :startTime, :endTime, :locationId; :price, :ticketsLeft)";
        $statement = $this->db->prepare($query);
        $statement->execute(
            array(
                'type'           =>     $type,
                'date'           =>     $date,
                'startTime'      =>     $startTime,
                'endTime'        =>     $endTime,
                'locationId'     =>     $locationId,
                'price'          =>     $price,
                'ticketsLeft'    =>     $ticketsLeft
            )
        );

        $count = $statement->rowCount();

        return $count;
    }

    public function updateArtist($id, $artistname, $description)
    {
        $query = "UPDATE artist SET artistname=:artistname, description=:description WHERE id = :id;";
        $statement = $this->db->prepare($query);
        $statement->execute(
            array(
                'id'                 =>     $id,
                'artistname'         =>     $artistname,
                'description'        =>     $description
            )
        );

        $count = $statement->rowCount();
    }
}
