<?php

namespace model\elementihtml;

use model\Item;

class Elementohtml implements Item {

    private $id;
    private $pageName;
    private $id_elemento;
    private $testo;
    private $file_src;

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
     * Get the value of id_elemento
     */ 
    public function getId_elemento()
    {
        return $this->id_elemento;
    }

    /**
     * Set the value of id_elemento
     *
     * @return  self
     */ 
    public function setId_elemento($id_elemento)
    {
        $this->id_elemento = $id_elemento;

        return $this;
    }

    /**
     * Get the value of testo
     */ 
    public function getTesto()
    {
        return $this->testo;
    }

    /**
     * Set the value of testo
     *
     * @return  self
     */ 
    public function setTesto($testo)
    {
        $this->testo = $testo;

        return $this;
    }

    /**
     * Get the value of file_src
     */ 
    public function getFile_src()
    {
        return $this->file_src;
    }

    /**
     * Set the value of file_src
     *
     * @return  self
     */ 
    public function setFile_src($file_src)
    {
        $this->file_src = $file_src;

        return $this;
    }

    /**
     * Get the value of pageName
     */ 
    public function getPageName()
    {
        return $this->pageName;
    }

    /**
     * Set the value of pageName
     *
     * @return  self
     */ 
    public function setPageName($pageName)
    {
        $this->pageName = $pageName;

        return $this;
    }
}

?>