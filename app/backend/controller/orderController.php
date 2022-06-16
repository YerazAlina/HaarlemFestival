<?php

require_once __DIR__ . ('../../service/orderService.php');
require_once __DIR__ . ('../../controller/paymentController.php');


class orderController{

    
    private orderService $orderservice;
    private paymentController $paymentcontroller;

    public function __construct(){
        $this->orderservice = new orderService();
        $this->paymentcontroller = new paymentController();
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
            $subtotal = 5 ; // idk how to get a value from a span
            $vat = 2; // ^^^^^^^
            $total =7; //^^^^^^^
            $paymentDue = date('m/d/y');
            $invoiceDate = date('m/d/y');

            if($this->orderservice->addOrder($fullName, $email, $address, $houseNo, $city, $postCode, $phoneNumber, $subtotal, $vat, $total, $paymentDue, $invoiceDate)){
                
               
                foreach($_SESSION['cart'] as $items => $values){
                $activityId = $values['id'];
                $quantity = $values['quantity'];
                $subtotal = $quantity * $values['price'];

                $this->orderservice->addOrderItems(31, $activityId, $quantity, $subtotal);
                    
                }
                header('Location: confirmation');

                //$this->paymentcontroller->InitializeMollie();
                

            }





        }

        require __DIR__ . ('/../views/cart.php');
        
    }
}