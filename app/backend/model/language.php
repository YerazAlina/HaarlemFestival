<?php

public int $id;
public string $type;


/**
     * @param int $id
     * @param string $type 
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
     * @return string
     */
    public function getType(): string
    {
        return $this->type ;
    }

    /**
     * @param string $type 
     */
    public function setType(string $type ): void
    {
        $this->type  = $type ;
    }