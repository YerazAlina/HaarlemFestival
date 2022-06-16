<?php

require_once('../db.php');
require_once __DIR__ . ('../../model/order.php');

class orderRepository
{

    private DB $db;
    private $stmt;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public string $insert_into_order = "INSERT INTO orders (fullName, email, address, houseNo, city, postCode, phoneNumber, subtotal, vat, total, paymentDue, invoiceDate) VALUES (:fullName, :email, :address, :houseNo, :city, :postCode, :phoneNumber, :subtotal, :vat, :total, NOW(), NOW())";
    public string $insert_into_orderItems = "INSERT INTO orderItems (orderId, activityId, quantity, subtotal) VALUES (:orderId, :activityId, :quantity, :subtotal)";
    public string $get_last_id = "SELECT orderId FROM orders ORDER BY orderId DESC LIMIT 1";


    public function addOrder($fullName, $email, $address, $houseNo, $city, $postCode, $phoneNumber, $subtotal, $vat, $total, $paymentDue, $invoiceDate)
    {
        //$count = "";
        $this->stmt = $this->db->prepare($this->insert_into_order);
        
        // $this->stmt->bindParam('orderId', $orderId);
        // $this->stmt->bindParam('fullName', $fullName);
        // $this->stmt->bindParam('email', $email);
        // $this->stmt->bindParam('address', $address);
        // $this->stmt->bindParam('houseNo', $houseNo);
        // $this->stmt->bindParam('city', $city);
        // $this->stmt->bindParam('postCode', $postCode);
        // $this->stmt->bindParam('phoneNumber', $phoneNumber);
        // $this->stmt->bindParam('subtotal', $subtotal);
        // $this->stmt->bindParam('vat', $vat);
        // $this->stmt->bindParam('total', $total);
        // $this->stmt->bindParam('paymentDue', $paymentDue);
        // $this->stmt->bindParam('invoiceDate', $invoiceDate);



        $this->stmt->execute(
            array(
              
                //'orderId'     => $orderId,
                'fullName'    => $fullName,
                'email'       => $email,
                'address'     => $address,
                'houseNo'     => $houseNo,
                'city'        => $city,
                'postCode'    => $postCode,
                'phoneNumber' => $phoneNumber,
                'subtotal'    => $subtotal,
                'vat'         => $vat,
                'total'       => $total
                // 'paymentDue'  => $paymentDue,
                // 'invoiceDate' => $invoiceDate

            )
        );

        $count = $this->stmt->rowCount();

        if($count == 0){
            echo 'failed to add order.....';
            return false;

        }
        else{
            return true;
        }
   
    }

    public function addOrderItems($orderId, $activityId, $quantity, $subtotal){
        
        $this->stmt = $this->db->prepare($this->insert_into_orderItems);
        //$orderId = $this->getLastId();
    
        
        $this->stmt->execute(
            array(
              
                'orderId'    => $orderId,
                'activityId' => $activityId,
                'quantity'   => $quantity,
                'subtotal'   => $subtotal

            )
        );

        $count = $this->stmt->rowCount();

        if($count == 0){
            echo 'failed to add items.....';
            return false;

        }
        else{
            return true;
        }


    }

    public function getLastId(){

        $this->stmt = $this->db->prepare($this->get_last_id);
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
        
    }

}