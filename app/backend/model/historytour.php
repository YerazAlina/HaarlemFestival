<?php

public int $id;
public int $dateId;
public int $timeId;
public int $typeId;
public int $guideId;
public int $seatsId;
public int $priceId;


/**
     * @param int $id
     * @param int $dateId 
     * @param int $timeId 
     * @param int $typeId 
     * @param int $guideId 
     * @param int $seatsId 
     * @param int $priceId 
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
    public function getDateId(): int
    {
        return $this->dateId;
    }

    /**
     * @param int $dateId
     */
    public function setDateId(int $dateId): void
    {
        $this->dateId = $dateId;
    }
     /**
     * @return int
     */
    public function getTimeId(): int
    {
        return $this->timeId;
    }

    /**
     * @param int $timeId
     */
    public function setTimeId(int $timeId): void
    {
        $this->timeId = $timeId;
    }
      /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->typeId;
    }

    /**
     * @param int $typeId
     */
    public function setTypeId(int $typeId): void
    {
        $this->typeId = $typeId;
    }
     /**
     * @return int
     */
    public function getGuideId(): int
    {
        return $this->guideId;
    }

    /**
     * @param int $guideId
     */
    public function setGuideId(int $guideId): void
    {
        $this->guideId = $guideId;
    }
    /**
     * @return int
     */
    public function getSeatsId(): int
    {
        return $this->seatsId;
    }

    /**
     * @param int $seatsId
     */
    public function setGuideId(int $seatsId): void
    {
        $this->seatsId = $seatsId;
    }
    
    /**
     * @return int
     */
    public function getPriceId(): int
    {
        return $this->priceId;
    }

    /**
     * @param int $priceId
     */
    public function setPriceId(int $priceId): void
    {
        $this->priceId = $priceId;
    }