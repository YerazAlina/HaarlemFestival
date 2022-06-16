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

    public function allfoodRestaurantCMS()
    {
        $restaurants = $this->foodservice->getRestaurants();
        require __DIR__ . ('/../views/cms/food/foodsessionscms.php');
    }

    // get a restaurant by Id
    public function getRestaurantById()
    {
        $id = ($_POST['addTicket']);
        //$id = ($_POST['bookNow']);
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

    //RESERVATIONS
    public function allReservations()
    {
        $reservations = $this->foodservice->getAllReservations();
        require __DIR__ . ('/../views/cms/reservations/reservationcms.php');
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

    //THIS IS NOT WORKING CORRRECTLHYYYSAFFSHSAKJHJFDASJFSLJSLK AQFJOK
    public function changeStatus($id)
    {
        $reservation = $this->foodservice->findOneReservation($id);
        $bit = $reservation->isActive;

        if ($bit === 1) {
            $bit = 0;
        } else if ($bit === 0) {
            $bit = 1;
        }

        $count = $this->foodservice->changeStatus($id, $bit);
    }

    public function getRestaurantByIdCMS($id)
    {
        $restaurant = $this->foodservice->findOne($id);
        return $restaurant;
    }

    public function getFoodActivityById($id)
    {
        $foodActivity = $this->foodservice->findOneActivity($id);
        return $foodActivity;
    }

    public function getReservationById($id)
    {
        $reservation = $this->foodservice->findOneReservation($id);
        return $reservation;
    }
}
