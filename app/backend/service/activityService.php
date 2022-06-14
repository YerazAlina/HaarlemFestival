<?php

require_once __DIR__ . ('../../model/activity.php');
require_once __DIR__ . ('../../model/foodActivity.php');
require_once __DIR__ . ('../../repository/foodRepository.php');
require_once __DIR__ . ('../../model/artist.php');
require_once __DIR__ . ('../../model/jazzActivity.php');
require_once __DIR__ . ('../../repository/jazzRepository.php');
require_once __DIR__ . ('../../repository/activityRepository.php');

class activityService{

    private activityRepository $activityrepository;

    public function __construct(){
        $this->activityrepository = new activityrepository();
    }

    public function getType($id){
        return $this->activityrepository->findById($id);
    }

}

