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

    
    public function findById($id){
        return $this->jazzrepository->findById($id);
    }



}