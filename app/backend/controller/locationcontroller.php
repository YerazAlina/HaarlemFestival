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
}