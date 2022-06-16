<?php
require_once("foodActivity.php");

class Reservation {
    public int $id;
    public int $foodActivityId;
    public int $nrOfGuests;
    public int $isActive;

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of foodActivityId
     */ 
    public function getFoodActivityId()
    {
        return $this->foodActivityId;
    }

    /**
     * Set the value of foodActivityId
     *
     * @return  self
     */ 
    public function setFoodActivityId($foodActivityId)
    {
        $this->foodActivityId = $foodActivityId;

        return $this;
    }

    /**
     * Get the value of nrOfGuests
     */ 
    public function getNrOfGuests()
    {
        return $this->nrOfGuests;
    }

    /**
     * Set the value of nrOfGuests
     *
     * @return  self
     */ 
    public function setNrOfGuests($nrOfGuests)
    {
        $this->nrOfGuests = $nrOfGuests;

        return $this;
    }

    /**
     * Get the value of isActive
     */ 
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set the value of isActive
     *
     * @return  self
     */ 
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }
}