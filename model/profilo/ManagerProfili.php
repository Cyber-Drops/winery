<?php

namespace model\profilo;

use model\Config;
use model\Crud;
use model\Item;
use model\Profilo as Query;;
use PDO;
use PDOException;


class ManagerProfili implements Crud {
    
    private $DBLink = null;

    function __construct(){ 
        try {
            $this->DBLink = new PDO(Config::DSN, Config::DBUSER, Config::DBPASSWORD,Config::PDO_OPTIONS);
        }catch(PDOException $exeption) {
            exit($exeption->getMessage());
        }
    }

    function  login(string $nickname, $password): array {
        try{
            $stmt = $this->DBLink->prepare(Query::LOGIN);
            $stmt->execute([$nickname, $password]);
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'model\profilo\Profilo');
        }catch(PDOException $exeption){
            exit($exeption->getMessage());
        }
        return [];
    }

    function insert($item): bool {
        return false;
    }

    function readSingle($pk): Item {
        //da implementare
        return new Item($pk);
    }
    function readAllWhere($pk):array {
        return [];
    }
    function readAll(): array {
        return [];
    }

    function updateSingle(string $pk): bool
    {
        return false;
    }

    function deleteSingle(string $pk): bool
    {
        return false;
    }
    

}


?>