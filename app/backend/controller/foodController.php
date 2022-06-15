<?php

require_once __DIR__ . ('../../service/foodService.php');

class foodController
{

    private foodService $foodservice;


    public function __construct(){
        $this->foodservice = new foodService();
    }

    // all restaurants
    public function allfoodRestaurant(){
        $restaurants = $this->foodservice->getRestaurants();
        require __DIR__ . ('/../views/food.php');
    }

    // get a restaurant by Id
    public function getRestaurantById() {
        $id = ($_POST['addTicket']);
        //$id = ($_POST['bookNow']);
        // if(Is_null($id)) {
        //     header("Location: food");
        //     exit();
        // }
        $restaurant = $this->foodservice->findById($id);
        return $restaurant;
    }
}