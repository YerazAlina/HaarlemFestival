<?php

require_once __DIR__ . ('../../service/orderService.php');
require_once __DIR__ . ('../../controller/paymentController.php');
require_once __DIR__ . ('../../service/activityService.php');



class orderController{

    
    private orderService $orderservice;
    private activityService $activityservice;
    private paymentController $paymentcontroller;

    public function __construct(){
        $this->orderservice = new orderService();
        $this->paymentcontroller = new paymentController();
        $this->activityservice = new activityService();
    }

    public function purchase()
    {

        if($_SERVER['REQUEST_METHOD'] === 'POST'){


            $fullName = $_POST['customer_full_name'] ;
            $email = $_POST['customer_email'] ;
            $address = $_POST['customer_address'];
            $houseNo = $_POST['customer_house_num'];
            $city =  $_POST['customer_city'];
            $postCode = $_POST['customer_post_code'] ;
            $phoneNumber = $_POST['customer_phone_number'];
            $subtotal = 100;
            $vat = 21; 
            $total = 121; 
            $paymentDue = date('m/d/y');
            $invoiceDate = date('m/d/y');

            if($fullName == null || $email == null || $address == null || $houseNo == null || $city == null || $postCode == null || $phoneNumber == null || $subtotal == 0 || $vat == 0|| $total == 0){

                $message = "Please enter all the required fields !";

            }

            else{

                if($this->orderservice->addOrder($fullName, $email, $address, $houseNo, $city, $postCode, $phoneNumber, $subtotal, $vat, $total, $paymentDue, $invoiceDate)){
                
                    $lastId = $this->orderservice->getLastId();
                    $orderId = implode(",",$lastId);
               
                    foreach($_SESSION['cart'] as $items => $values){
                        $activityId = $values['id'];
                        $quantity = $values['quantity'];
                        $subtotal = $quantity * $values['price'];

                        $this->orderservice->addOrderItems($orderId, $activityId, $quantity, $subtotal);
                                
                        $updatedTicketNo = $values['ticketsLeft'] - $quantity;
                        $this->activityservice->updateTicketsLeft($activityId, $updatedTicketNo);
                        
                    }
    
                    $_SESSION['email'] = $email;

                    unset($_SESSION['cart']);

                    header('Location: confirmation');
                    exit;
    
                    //$this->paymentcontroller->InitializeMollie();
                    
    
                }

            }

           

          

        }

        require __DIR__ . ('/../views/cart.php');
        
    }
}