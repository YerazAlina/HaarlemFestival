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
}