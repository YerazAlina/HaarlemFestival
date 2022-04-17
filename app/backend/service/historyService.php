<?php

require_once __DIR__ . ('../../model/historytour.php');
require_once __DIR__ . ('../../repository/historyRepository.php');

class historyService{

    private historyRepository $historyrepository ;


    public function __construct(){
        $this->historyrepository = new historyrepository();
    }

    public function getEvents(){
        return $this->historyrepository->findAll();
    }


}