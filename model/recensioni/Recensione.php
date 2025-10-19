<?php

namespace model\recensioni;

use model\Item;

class Recensione implements Item{

    private $id;
    private $nickname;
    private $messaggio;
    private $stato;

    function __construct(){}

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
     * Get the value of nickname
     */ 
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set the value of nickname
     *
     * @return  self
     */ 
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get the value of messaggio
     */ 
    public function getMessaggio()
    {
        return $this->messaggio;
    }

    /**
     * Set the value of messaggio
     *
     * @return  self
     */ 
    public function setMessaggio($messaggio)
    {
        $this->messaggio = $messaggio;

        return $this;
    }

    /**
     * Get the value of stato
     */ 
    public function getStato()
    {
        return $this->stato;
    }

    /**
     * Set the value of stato
     *
     * @return  self
     */ 
    public function setStato($stato)
    {
        $this->stato = $stato;

        return $this;
    }
}

?>