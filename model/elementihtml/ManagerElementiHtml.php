<?php

namespace model\elementihtml;

use model\Config;
use model\Crud;
use model\Item;
use model\ElementoHtml as Query;
use PDO;
use PDOException;

class ManagerElementiHtml implements Crud{

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

    function readAllWhere(string $pk): array{
        try{
            $stmt = $this->DBLink->prepare(Query::READALLWHERE);
            $stmt->execute([$pk]);
            return $stmt->fetchAll(PDO::FETCH_CLASS, '\model\elementihtml\Elementohtml');
        }catch(PDOException $exeption){
            return [];
            exit($exeption->getMessage());
        }
        return [];
    }

    function readAll(): array {
        try{
            $stmt = $this->DBLink->prepare(Query::READALL);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, '\model\elementihtml\Elementohtml');
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
        
        return false;
    }

    //SPECIFICA
    function updateSingleElement(string $testo, string $file_src, string $namePage, string $id_element):bool{
        try{
            $stmt = $this->DBLink->prepare(Query::UPDATESINGLEELEMENT);
            $stmt->execute([$testo, $file_src,$namePage, $id_element]);
            return true;
        }catch(PDOException $exeption){
            //return $exeption->getMessage();
            return false;
            /*
            exit($exeption->getMessage());
            return false;
            */
        }
    }


}

?>