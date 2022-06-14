<?php
require_once __DIR__ . ('../../model/Location.php');
require_once __DIR__ . ('../../repository/LocationRepository.php');

class LocationService
{
    private LocationRepository $locationRepository;

    public function __construct()
    {
        $this->locationRepository = new LocationRepository();
    }

    public function getAllLocations()
    {
        return $this->locationRepository->findAll();
    }

    public function findOne($id){
        return $this->locationRepository->findById($id);
    }

    public function updateLocation($id, $name, $address, $postalCode, $city, $capacity)
    {
        return $this->locationRepository->updateLocation($id, $name, $address, $postalCode, $city, $capacity);
    }

    public function addLocation($name, $address, $postalCode, $city, $capacity)
    {
        return $this->locationRepository->addLocation($name, $address, $postalCode, $city, $capacity);
    }
}