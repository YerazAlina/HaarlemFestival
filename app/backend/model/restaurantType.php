<?php

class restaurantType {
    
    public int $id;
    public string $name;

    public function getId() : int
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }
}