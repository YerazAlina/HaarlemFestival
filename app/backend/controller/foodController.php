<?php

require_once __DIR__ . ('../../service/foodService.php');

class foodController
{

    private foodService $foodservice;


    public function __construct(){
        $this->foodservice = new foodService();
    }

    public function allfoodRestaurant(){
        $restaurants = $this->foodservice->getRestaurants();
        require __DIR__ . ('/../views/food.php');
    }
}