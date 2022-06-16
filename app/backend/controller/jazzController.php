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

        $thursday = $this->thursdayEvents();
        $friday = $this->fridayEvents();
        $saturday = $this->saturdayEvents();
        $sunday = $this->sundayEvents();
        
        require __DIR__ . ('/../views/jazzevents.php');
    }

    public function thursdayEvents(){
        return $this->jazzservice->getThursdayEvents();

    }

    public function fridayEvents(){
        return $this->jazzservice->getFridayEvents();

    }

    public function saturdayEvents(){
        return $this->jazzservice->getSaturdayEvents();

    }

    public function sundayEvents(){
        return $this->jazzservice->getSundayEvents();

    }




}