<?php

namespace model\prodotti;
use model\Item;

class Prodotto implements Item{

    private $id;
    private $nome;
    private $prezzo;
    private $descrizione;
    private $img;
    private $sconto;
    private $scorte;

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
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of prezzo
     */ 
    public function getPrezzo()
    {
        return $this->prezzo;
    }

    /**
     * Set the value of prezzo
     *
     * @return  self
     */ 
    public function setPrezzo($prezzo)
    {
        $this->prezzo = $prezzo;

        return $this;
    }

    /**
     * Get the value of descrizione
     */ 
    public function getDescrizione()
    {
        return $this->descrizione;
    }

    /**
     * Set the value of descrizione
     *
     * @return  self
     */ 
    public function setDescrizione($descrizione)
    {
        $this->descrizione = $descrizione;

        return $this;
    }

    /**
     * Get the value of sconto
     */ 
    public function getSconto()
    {
        return $this->sconto;
    }

    /**
     * Set the value of sconto
     *
     * @return  self
     */ 
    public function setSconto($sconto)
    {
        $this->sconto = $sconto;

        return $this;
    }

    /**
     * Get the value of scorte
     */ 
    public function getScorte()
    {
        return $this->scorte;
    }

    /**
     * Set the value of scorte
     *
     * @return  self
     */ 
    public function setScorte($scorte)
    {
        $this->scorte = $scorte;

        return $this;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }
}

?>