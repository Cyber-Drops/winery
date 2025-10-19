<?php

namespace model\carrelli;

use model\Crud;
use model\Item;
use model\carrelli\Prodotto;
use model\Carrello as Query;
use model\Config;
use PDO;
use PDOException;

class ManagerCarrelli implements Crud{

    private $DBLink;

    function __construct(){
        try{

            $this->DBLink = new PDO(Config::DSN, Config::DBUSER, Config::DBPASSWORD, Config::PDO_OPTIONS);

        }catch(PDOException $exception){
            exit($exception->getMessage());
        }
    }

    function insert(Item $item): bool{
        try{
            $stmt = $this->DBLink->prepare(Query::INSERT);
            $stmt->execute([$item->getId_prodotto(), $item->getId_profilo(), $item->getQta()]);
            return true;
        }catch(PDOException $exception){
            exit($exception->getMessage());
        }
        return false;
    }

    function readMyCart($id_profilo): array {
        try{
            $stmt = $this->DBLink->prepare(Query::SELECT_MY_CART);
            $stmt->execute([$id_profilo]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $exception){
            exit($exception->getMessage());
        }
        return [];
    }

    function readSingle(string $pk): Item{
        return new Item($pk);
    }
    function readAllWhere(String $id_profilo):array{
        try{
            $stmt = $this->DBLink->prepare(Query::READALLWHERE);
            $stmt->execute([$id_profilo]);
            return $stmt->fetchAll(PDO::FETCH_CLASS, '\model\carrelli\Carrello');
        }catch(PDOException $exeption){
            return [];
            exit($exeption->getMessage());
        }
        return [];
    }
    function readAllProduct(String $id_prodotto):array{
        try{
            $stmt = $this->DBLink->prepare(Query::READALLPRODUCT);
            $stmt->execute([$id_prodotto]);
            return $stmt->fetchAll(PDO::FETCH_CLASS, '\model\carrelli\Carrello');
        }catch(PDOException $exeption){
            return [];
            exit($exeption->getMessage());
        }
        return [];
    }
    function readAll():array{
        try{
            $stmt = $this->DBLink->prepare(Query::READALL);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, '\model\carrelli\Prodotto');
        }catch(PDOException $exeption){
            return [];
            exit($exeption->getMessage());
        }
        return [];
    }
    function updateSingle(string $pk):bool{
        return false;
    }
    function updateSingleCarrello(Item $item){
        try{
            $stmt = $this->DBLink->prepare(Query::UPDATESINGLECARRELLO);
            $stmt->execute([$item->getId_prodotto(), $item->getId_profilo(), $item->getQta(), $item->getId_profilo(), $item->getId_prodotto()]);
            return $stmt->rowCount();
        }catch(PDOException $exeption){
            return false;
            exit($exeption->getMessage());
        }
        return false;
    }
    function deleteSingle(string $pk):bool{
        try{
            $stmt = $this->DBLink->prepare(Query::DELETESINGLE);
            $stmt->execute([$pk]);
            return true;
        }catch(PDOException $exeption){
            return false;
            exit($exeption->getMessage());
        }
        return false;
    }
   function deleteCart(string $id_profilo):bool {
    try{
        $stmt = $this->DBLink->prepare(Query::DELETECART);
        $stmt->execute([$id_profilo]);
        return true;
    }catch(PDOException $exeption){
        return false;
        exit($exeption->getMessage());
    }
    return false;
   }
}

?>