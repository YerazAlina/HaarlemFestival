<?php

require_once("location.php");



class artist {

    public int $id;
    public string $name;
    public string $artistdescription;

    /**
     * @param int $id
     * @param string $name
     * @param string $artistdescription
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
    public function getArtistdescription(): string
    {
        return $this->artistdescription;
    }

    /**
     * @param string $artistdescription
     */
    public function setArtistdescription(string $artistdescription): void
    {
        $this->artistdescription = $artistdescription;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}