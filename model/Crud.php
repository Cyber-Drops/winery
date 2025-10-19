<?php

namespace model;

interface Crud{

    //function login(string $nickname, string $password): array;
    function insert(Item $item): bool;
    function readSingle(string $pk): Item;
    function readAllWhere(String $pk):array;
    function readAll():array;
    function updateSingle(string $pk):bool;
    function deleteSingle(string $pk):bool;
}

?>