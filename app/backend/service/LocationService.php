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
}