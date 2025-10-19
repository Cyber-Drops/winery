<?php

namespace model\recensioni;

use model\Config;
use model\Crud;
use model\Item;
use model\Recensione as Query;
use PDO;
use PDOException;

class ManagerRecensioni implements Crud{

    private $DBLink;

    function __construct(){
        try{
            $this->DBLink = new PDO(Config::DSN, Config::DBUSER, Config::DBPASSWORD, Config::PDO_OPTIONS);

        }catch(PDOException $exeption){
            exit($exeption->getMessage());
        }
    }


    function insert($item): bool {
        try{
            $stmt = $this->DBLink->prepare(Query::INSERT);
            $stmt->execute([$item->getNickname(), $item->getMessaggio()]);
            return true;
        }catch(PDOException $exeption){
            return false;
            exit($exeption->getMessage());
        }
        return false;
    }

    function readSingle($pk): Item{
        return new Item($pk);
    }

    function readAll(): array {
        try{
            $stmt = $this->DBLink->prepare(Query::READALL);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, '\model\recensioni\Recensione');
        }catch(PDOException $exeption){
            return [];
            exit($exeption->getMessage());
        }
        return [];
    }
    function readAllWhere(string $pk): array {
        try{
            $stmt = $this->DBLink->prepare(Query::READALLWHERE);
            $stmt->execute([$pk]);
            return $stmt->fetchAll(PDO::FETCH_CLASS, '\model\recensioni\Recensione');
        }catch(PDOException $exeption){
            return [];
            exit($exeption->getMessage());
        }
        return [];
    }

    function updateSingle(string $pk): bool{
        try{
            $stmt = $this->DBLink->prepare(Query::UPDATESINGLE);
            $stmt->execute(["revisionata",$pk]);
            return true;
        }catch(PDOException $exeption){
            exit($exeption->getMessage());
            return false;
        }
    }

    function deleteSingle(string $pk): bool{
        try{
            $stmt = $this->DBLink->prepare(Query::DELETESINGLE);
            $stmt->execute([$pk]);
            return true;
        }catch(PDOException $exeption){
            exit($exeption->getMessage());
            return false;
        }
        return false;
    }

}


?>