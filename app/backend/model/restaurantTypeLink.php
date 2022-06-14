<?php

require_once("restaurant.php");
require_once("restaurantType.php");

class restaurantTypeLink {

    public int $id;
    public int $restaurantTypeId;
    public int $restaurantId;

    public function getId() : int
    {
        return $this->id;
    }

    public function getRestaurant() : int
    {
        return $this->restaurantId;
    }
    
    public function getType() : int
    {
        return $this->restaurantTypeId;
    }
}