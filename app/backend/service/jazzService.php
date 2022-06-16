<?php

require_once __DIR__ . ('../../model/artist.php');
require_once __DIR__ . ('../../model/activity.php');
require_once __DIR__ . ('../../model/jazzActivity.php');
require_once __DIR__ . ('../../repository/jazzRepository.php');

class jazzService{

    private jazzRepository $jazzrepository ;


    public function __construct(){
        $this->jazzrepository = new jazzRepository();
    }

    public function getEvents(){
        return $this->jazzrepository->findAll();
    }

    public function getThursdayEvents(){
        return $this->jazzrepository->getThursdayEvents();
    }

    public function getFridayEvents(){
        return $this->jazzrepository->getFridayEvents();
    }

    public function getSaturdayEvents(){
        return $this->jazzrepository->getSaturdayEvents();
    }

    public function getSundayEvents(){
        return $this->jazzrepository->getSundayEvents();
    }

    public function getArtists(){
        return $this->jazzrepository->findAllArtists();
    }
  
    public function getOne($id){
        return $this->jazzrepository->findById($id);
    }

    public function findOneArtist($id){
        return $this->jazzrepository->findByIdArtist($id);
    }

    public function addEvent($type, $date, $startTime, $endTime, $locationId, $price, $ticketsLeft)
    {
        return $this->jazzrepository->addEvent($type, $date, $startTime, $endTime, $locationId, $price, $ticketsLeft);
    }

    public function addArtist($name, $description)
    {
        return $this->jazzrepository->addArtist($name, $description);
    }

    public function updateArtist($id, $artist, $description)
    {
        return $this->jazzrepository->updateArtist($id, $artist, $description);
    }

    public function deleteArtist($id)
    {
        return $this->jazzrepository->deleteOne($id);
    }
}