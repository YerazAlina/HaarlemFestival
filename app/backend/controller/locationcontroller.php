<?php
require __DIR__ . ('../../service/LocationService.php');

class LocationController
{
    private LocationService $service;

    public function __construct()
    {
        $this->service = new LocationService();
    }

    public function allLocations(){
        $locations = $this->service->getAllLocations();
        require __DIR__ . ('/../views/cms/location/locationcms.php');
    }

    public function getLocation($id)
    {
        $location = $this->service->findOne($id);
        return $location;
    }

    public function updateLocation($id)
    {
        //<!-- id -- name -- address -- postalCode -- city -- capacity -->
        $name =  $_POST['name'];
        $address = $_POST['address'];
        $postalCode =  $_POST['postalCode'];
        $city = $_POST['city'];
        $capacity =  $_POST['capacity'];

        $count = $this->service->updateLocation($id, $name, $address, $postalCode, $city, $capacity);
    }

}