<?php

use model\carrelli\ManagerCarrelli;
use model\carrelli\Prodotto;
use model\ManagerDB;

session_start();

if (!isset($_SESSION['loggato'])){
    header('Location:../../../view/home.php');
   exit();
}else{
    require_once '../../../model/Crud.php';
    require_once '../../../model/Item.php';
    require_once '../../../model/Config.php';
    require_once '../../../model/Query.php';
    require_once '../../../model/ManagrDB.php';
    require_once '../../../model/carrelli/ManagerCarrelli.php';
    require_once '../../../model/carrelli/Prodotto.php';
    require_once '../../../model/carrelli/Carrello.php';

    $filters = ["id"=>FILTER_VALIDATE_INT, "qta"=>array("filter"=>FILTER_VALIDATE_INT, "options"=>array("min_range"=>1, "max_range"=>9))];
    $form_data = filter_input_array(INPUT_GET, $filters);
    //echo var_dump($form_data);
    $managerDB = new ManagerDB();
    $managerCarrello = new ManagerCarrelli();
    $prodotto = new Prodotto();
    $prodotto->setId_prodotto($form_data['id']);
    $prodotto->setQta($form_data['qta']);
    $prodotto->setId_profilo($_SESSION['id_profilo']);
    
    $listaProdotto = $managerCarrello->readAllProduct($form_data['id']);
    echo var_dump($listaProdotto);
    if(empty($listaProdotto)){
        echo $managerDB->insert($managerCarrello, $prodotto) !== false ? "ok" : "ko";
    }else{
        if($listaProdotto['qta'] !== $form_data['qta']){
            echo $managerCarrello->updateSingleCarrello($prodotto) !== false ? "ok" : "ko";
        }
    }
}



?>