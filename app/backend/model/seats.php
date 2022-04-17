<?php

public int $id;
public int $number;


/**
     * @param int $id
     * @param int $number  
     */

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
     /**
     * @return int
     */
    public function getType(): int
    {
        return $this->number ;
    }

    /**
     * @param int $number 
     */
    public function setType(int $number ): void
    {
        $this->number  = $number ;
    }