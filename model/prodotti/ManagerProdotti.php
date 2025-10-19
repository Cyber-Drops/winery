<?php

namespace model\prodotti;

use model\Config;
use model\Crud;
use model\Item;
use model\Prodotto as Query;
use PDO;
use PDOException;

class ManagerProdotti implements Crud {
    
    private $DBLink;

    function __construct(){
        try{

            $this->DBLink = new PDO(Config::DSN, Config::DBUSER, Config::DBPASSWORD, Config::PDO_OPTIONS);

        }catch(PDOException $exception){
            exit($exception->getMessage());
        }
    }

    function insert(Item $item): bool {
        return false;
    }
    function readSingle(string $pk): Item {
        return new Item($pk);
    }
    function readAllWhere(String $pk):array {
        return array();
    }
    function readAll():array {
        try{
            $stmt = $this->DBLink->prepare(Query::READALL);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS,'\model\prodotti\Prodotto');
        }catch(PDOException $exception){
            exit($exception->getMessage());
        }
        return array();
    }
    function updateSingle(string $pk):bool {
        return false;
    }
    function deleteSingle(string $pk):bool {
        return false;
    }

}

?>