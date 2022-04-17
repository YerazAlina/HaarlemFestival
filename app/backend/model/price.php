<?php
public int $id;
public double $price;


/**
     * @param int $id
     * @param double $price  
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
     * @return double
     */
    public function getPrice(): double
    {
        return $this->price ;
    }

    /**
     * @param double $price 
     */
    public function setPrice(double $price  ): void
    {
        $this->price   = $price  ;
    }