
<?php

require_once __DIR__ . ('../../service/jazzService.php');

class cartController{

    
    private jazzService $jazzservice;


    public function __construct(){
        $this->jazzservice = new jazzService();
    }

    public function index(){

        if(!isset($_SESSION['tickets']))
            $_SESSION['tickets'] = array();


        $tickets = $this->getCartTickets();
        require __DIR__ . ('/../views/cart.php');

    }


    public function getCartTickets(){
        $tickets = array();

        AddTicketToCart();

        foreach($_SESSION['tickets'] as $key => $value){
            $ticket = $this->jazzService->findById($key);
            array_push($tickets, array('event' => $ticket, 'amount' =>$value));
        }

        return $tickets;
    }



    public function AddTicketToCart() {

        if (isset($_POST['addTicket']) )

            $_SESSION['tickets']=array();

        
                
        $id = $_POST['addTicket'];

        if (array_key_exists($id, $_SESSION['tickets'])) {
            $_SESSION['tickets'][$id] += 1;
        } else {
            $_SESSION['tickets'][$id] = 1;
        }

            
     

        /*

        // check if there are enough tickets
        if (!$this->checkTicketStock($id)) {
            header('Location: /hf/' . $event . '?event=' . $event);
            return;
        }

        if (array_key_exists($id, $_SESSION['tickets'])) {
            $_SESSION['tickets'][$id] += 1;
        } else {
            $_SESSION['tickets'][$id] = 1;
        }

        */

        require __DIR__ . ('/../views/jazzevents.php');
    }
}