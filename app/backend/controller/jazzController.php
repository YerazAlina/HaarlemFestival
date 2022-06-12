<?php

require_once __DIR__ . ('../../service/jazzService.php');

class jazzController
{

    private jazzService $jazzservice;


    public function __construct(){
        $this->jazzservice = new jazzService();
    }

    public function allJazzEvents(){
        $events = $this->jazzservice->getEvents();
        require __DIR__ . ('/../views/jazzevents.php');
    }
  
    public function allJazzEventscms(){
        $events = $this->jazzservice->getEvents();
        require __DIR__ . ('../../views/cms/jazz/jazzcms.php');
    }

    public function allJazzArtistscms(){
        $artists = $this->jazzservice->getArtists();
        require __DIR__ . ('../../views/cms/jazz/artistcms.php');
    }
}