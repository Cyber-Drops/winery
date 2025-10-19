<?php

namespace model;

use model\Item;
use model\Crud;

class ManagerDB {

    function insert(Crud $crud, Item $item){
        return $crud->insert($item);
    }

    function readAll(Crud $crud): array {
        return $crud->readAll();
    }

    function readSingle(Crud $crud, string $pk): Item {
        return $crud->readSingle($pk);
    }

    function readAllWhere(Crud $crud, string $pk): array{
        return $crud->readAllWhere($pk);
    }

    function updateSingle(Crud $crud, string $pk): bool{
        return $crud->updateSingle($pk);
    }

    function deleteSingle(Crud $crud, string $pk): bool{
        return $crud->deleteSingle($pk);
    }

}


?>