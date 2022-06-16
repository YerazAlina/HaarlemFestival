<?php

require_once __DIR__ . ('../../model/activity.php');
require_once __DIR__ . ('../../model/foodActivity.php');
require_once __DIR__ . ('../../repository/foodRepository.php');

class foodService{

    private foodRepository $foodrepository;

    public function __construct(){
        $this->foodrepository = new foodRepository();
    }

    public function getRestaurants(){
        return $this->foodrepository->findAll();
    }

    public function findById($id){
        return $this->foodrepository->findById($id);
    }

    //FOR CMS
    public function getAllRestaurants(){
        return $this->foodrepository->findAllRestaurants();
    }

    public function addRestaurant($location, $name, $description, $stars, $seats, $phoneNumber, $price, $parking, $website, $menu, $contact)
    {
        return $this->foodrepository->addRestaurant($location, $name, $description, $stars, $seats, $phoneNumber, $price, $parking, $website, $menu, $contact);
    }

    public function deleteRestaurant($id)
    {
        return $this->foodrepository->deleteOne($id);
    }

    public function findOne($id){
        return $this->foodrepository->findByIdCMS($id);
    }

    public function findOneActivity($id){
        return $this->foodrepository->findActivityByIdCMS($id);
    }

    public function findOneReservation($id){
        return $this->foodrepository->findReservationByIdCMS($id);
    }

    //changeStatus($id, $reservation->foodActivityId, $reservation->nrOfGuests, $reservation->isActive)
    public function changeStatus($id, $isActive)
    {
        return $this->foodrepository->changeStatus($id, $isActive);
    }

    public function updateRestaurant($id, $location, $name, $description, $stars, $seats, $phoneNumber, $price, $parking, $website, $menu, $contact)
    {
        return $this->foodrepository->updateRestaurant($id, $location, $name, $description, $stars, $seats, $phoneNumber, $price, $parking, $website, $menu, $contact);
    }

    public function getAllReservations(){
        return $this->foodrepository->findAllReservations();
    }




}