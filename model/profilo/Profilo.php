<?php
namespace model\profilo;
use model\Item;

class Profilo implements Item{
    private $user_id;
    private $username;
    private $email;
    private $password;
    private $stato;

    function __construct()
    {}
 
    /**
     * Get the value of id
     */ 
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
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
}
?>