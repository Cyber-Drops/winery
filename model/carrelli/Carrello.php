<?php

namespace model\carrelli;

class Carrello {

    private $id;
    private $id_prodotto;
    private $id_profilo;
    private $id_qta;

    

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
     * Get the value of id_prodotto
     */ 
    public function getId_prodotto()
    {
        return $this->id_prodotto;
    }

    /**
     * Set the value of id_prodotto
     *
     * @return  self
     */ 
    public function setId_prodotto($id_prodotto)
    {
        $this->id_prodotto = $id_prodotto;

        return $this;
    }

    /**
     * Get the value of id_profilo
     */ 
    public function getId_profilo()
    {
        return $this->id_profilo;
    }

    /**
     * Set the value of id_profilo
     *
     * @return  self
     */ 
    public function setId_profilo($id_profilo)
    {
        $this->id_profilo = $id_profilo;

        return $this;
    }

    /**
     * Get the value of id_qta
     */ 
    public function getId_qta()
    {
        return $this->id_qta;
    }

    /**
     * Set the value of id_qta
     *
     * @return  self
     */ 
    public function setId_qta($id_qta)
    {
        $this->id_qta = $id_qta;

        return $this;
    }
}

?>