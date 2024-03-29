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

    public function getArtists(){
        return $this->jazzrepository->findAllArtists();
    }

    public function getOne($id){
        return $this->jazzrepository->findById($id);
    }

    public function addArtist($artistname, $description)
    {
        return $this->jazzrepository->addArtist($artistname, $description);
    }

    public function addEvent($type, $date, $startTime, $endTime, $locationId, $price, $ticketsLeft)
    {
        return $this->jazzrepository->addEvent($type, $date, $startTime, $endTime, $locationId, $price, $ticketsLeft);
    }

    public function deleteArtist($id)
    {
        return $this->jazzrepository->deleteOne($id);
    }
}