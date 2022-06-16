<?php

require_once __DIR__ . ('../../service/foodService.php');

class foodController
{

    private foodService $foodservice;


    public function __construct()
    {
        $this->foodservice = new foodService();
    }

    // all restaurants
    public function allfoodRestaurant()
    {
        $restaurants = $this->foodservice->getRestaurants();
        require __DIR__ . ('/../views/food.php');
    }

    // get a restaurant by Id
    public function getRestaurantById()
    {
        $id = ($_POST['addTicket']);
        // if(Is_null($id)) {
        //     header("Location: food");
        //     exit();
        // }
        $restaurant = $this->foodservice->findById($id);
        return $restaurant;
    }

    //RESTAURANTS FOR CMS
    public function allRestaurants()
    {
        $restaurants = $this->foodservice->getAllRestaurants();
        require __DIR__ . ('/../views/cms/restaurants/foodcms.php');
    }

    public function addRestaurant()
    {
        // $id, $location, $name, $description, $stars, $seats, $phoneNumber, $price, $parking, $website, $menu, $contact

        //$id = $_POST['id'];
        $location = $_POST['location'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $stars = $_POST['stars'];
        $seats = $_POST['seats'];
        $phoneNumber = $_POST['phoneNumber'];
        $price = $_POST['price'];
        $parking = $_POST['parking'];
        $website = $_POST['website'];
        $menu = $_POST['menu'];
        $contact = $_POST['contact'];

        $count = $this->foodservice->addRestaurant($location, $name, $description, $stars, $seats, $phoneNumber, $price, $parking, $website, $menu, $contact);
    }

    public function updateRestaurant($id)
    {
        $location = $_POST['location'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $stars = $_POST['stars'];
        $seats = $_POST['seats'];
        $phoneNumber = $_POST['phoneNumber'];
        $price = $_POST['price'];
        $parking = $_POST['parking'];
        $website = $_POST['website'];
        $menu = $_POST['menu'];
        $contact = $_POST['contact'];

        $count = $this->foodservice->updateRestaurant($id, $location, $name, $description, $stars, $seats, $phoneNumber, $price, $parking, $website, $menu, $contact);
    }


    public function deleteRestaurant()
    {
        $restaurantId = $_POST['deleteRestaurant'];

        if (isset($_POST['deleteRestaurant'])) {
            $this->foodservice->deleteRestaurant($restaurantId);
            header('Location: foodcms');
        }
    }

    public function getRestaurantByIdCMS($id)
    {
        $restaurant = $this->foodservice->findOne($id);
        return $restaurant;
    }
}
