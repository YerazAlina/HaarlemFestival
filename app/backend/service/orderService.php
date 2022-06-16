<?php
require_once __DIR__ . ('../../model/order.php');
require_once __DIR__ . ('../../repository/orderRepository.php');

class orderService
{
    private orderRepository $orderRepository;

    public function __construct()
    {
        $this->orderRepository = new orderRepository();
    }

   
    public function addOrder($fullName, $email, $address, $houseNo, $city, $postCode, $phoneNumber, $subtotal, $vat, $total, $paymentDue, $invoiceDate)
    {
        return $this->orderRepository->addOrder($fullName, $email, $address, $houseNo, $city, $postCode, $phoneNumber, $subtotal, $vat, $total, $paymentDue, $invoiceDate);
    }

    public function addOrderItems($orderId, $activityId, $quantity, $subtotal){
        return $this->orderRepository->addOrderItems($orderId, $activityId, $quantity, $subtotal);
    }

    public function getLastId(){
        return $this->orderRepository->getLastId();
    }

}