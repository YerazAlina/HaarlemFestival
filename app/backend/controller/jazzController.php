<?php

require_once __DIR__ . ('../../service/jazzService.php');

class jazzController
{

    private jazzService $jazzservice;


    public function __construct(){
        $this->jazzservice = new jazzService();
    }

    public function getArtist($id)
    {
        $artist = $this->jazzservice->findOneArtist($id);
        return $artist;
    }

    public function allJazzEvents(){
        $events = $this->jazzservice->getEvents();
        require __DIR__ . ('/../views/jazzevents.php');
    }
  
    public function allJazzEventscms(){
        $events = $this->jazzservice->getEvents();
        require __DIR__ . ('../../views/cms/jazz/jazzcms.php');
    }

    public function addEvent()
    {
        $type =  $_POST['type'];
        $date = $_POST['date'];
        $startTime =  $_POST['startTime'];
        $endTime = $_POST['endTime'];
        $locationId =  $_POST['locationId'];
        $price = $_POST['price'];
        $ticketsLeft = $_POST['ticketsLeft'];

        $count = $this->jazzservice->addEvent($type, $date, $startTime, $endTime, $locationId, $price, $ticketsLeft);
    }

    public function allJazzArtistscms(){
        $artists = $this->jazzservice->getArtists();
        require __DIR__ . ('../../views/cms/jazz/artistcms.php');
    }

    public function addArtist()
    {
        $artistname =  $_POST['artistname'];
        $description = $_POST['description'];

        $count = $this->jazzservice->addArtist($artistname, $description);
    }

    public function updateArtist($id)
    {
        $artist =  $_POST['artist'];
        $description = $_POST['description'];

        $count = $this->jazzservice->updateArtist($id, $artist, $description);

        if(empty($count)){
            header("Location: artistcms");
        }
    }


    public function deleteArtist()
    {
        $artistId = $_POST['deleteArtist'];

        if (isset($_POST['deleteArtist'])) {
            $this->jazzservice->deleteArtist($artistId);
            header('Location: artistcms');
        }
    }
}