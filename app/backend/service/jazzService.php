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

    
    public function getOne($id){
        return $this->jazzrepository->findById($id);
    }



}