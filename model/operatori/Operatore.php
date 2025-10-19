<?php

namespace model\operatori;

use model\Item;

class Operatore implements Item {

    private $pk;
    private $ruolo;
    private $stato;
    private $password;
    private $nickname;
    
    function __construct(){
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
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

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

    /**
     * Get the value of ruolo
     */ 
    public function getRuolo()
    {
        return $this->ruolo;
    }

    /**
     * Set the value of ruolo
     *
     * @return  self
     */ 
    public function setRuolo($ruolo)
    {
        $this->ruolo = $ruolo;

        return $this;
    }

    /**
     * Get the value of pk
     */ 
    public function getPk()
    {
        return $this->pk;
    }

    /**
     * Set the value of pk
     *
     * @return  self
     */ 
    public function setPk($pk)
    {
        $this->pk = $pk;

        return $this;
    }
}

?>