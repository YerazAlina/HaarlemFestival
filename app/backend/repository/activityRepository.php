<?php

require_once('../db.php');
require_once __DIR__ . ('../../model/activity.php');
require_once __DIR__ . ('../../model/foodActivity.php');
require_once __DIR__ . ('../../model/restaurant.php');
require_once __DIR__ . ('../../model/restaurantTypelink.php');
require_once __DIR__ . ('../../model/restaurantType.php');
require_once __DIR__ . ('../../model/artist.php');
require_once __DIR__ . ('../../model/jazzActivity.php');
require_once __DIR__ . ('../../model/location.php');

class activityRepository
{
    private DB $db;
    private $stmt;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }


    private string $get_one_event_sql = "SELECT type FROM activity WHERE activity.id=:id";
    private string $update_ticket_left = "UPDATE activity SET ticketsLeft=:ticketsLeft WHERE id=:id";


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

    public function updateTicketsLeft($id, $updatedTicketNo){

        $this->stmt = $this->db->prepare($this->update_ticket_left);
        $this->stmt->execute([':ticketsLeft' => $updatedTicketNo,':id'=>$id]);

        $count = $this->stmt->rowCount();

        if($count == 0){
            //echo 'failed to update ticket no............';
            return false;

        }
        else{
            //echo 'updated ticket no = ' . $updatedTicketNo;
            return true;
        }




    }

}


?>