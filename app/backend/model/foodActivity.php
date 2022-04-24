<?php
require_once("activity.php");
require_once ("restaurant.php");

class foodActivity {
    
    private int $id;
    private int $restaurantId;
    private int $activityId;

    
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getRestaurantId(): int
    {
        return $this->restaurantId;
    }

    public function setRestaurantId(int $restaurantId): void
    {
        $this->restaurantId = $restaurantId;
    }

    public function getActivityId(): int
    {
        return $this->activityId;
    }

    public function setActivityId(int $activityId): void
    {
        $this->activityId = $activityId;
    }
}