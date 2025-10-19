<?php

namespace control\utils\prodotti;

use model\carrelli\ManagerCarrelli;
use model\ManagerDB;

session_start();

if (!isset($_SESSION['loggato'])){
    header('Location:../../../view/home.php');
   exit();
}else{
    function deleteCart(){
        require_once '../model/Crud.php';
        require_once '../model/Item.php';
        require_once '../model/Config.php';
        require_once '../model/Query.php';
        require_once '../model/ManagrDB.php';
        require_once '../model/carrelli/ManagerCarrelli.php';

        //$filters = ["id"=>FILTER_VALIDATE_INT];
        //$form_data = filter_input_array(INPUT_GET, $filters);

        $managerDB = new ManagerDB();
        $managerCarrello = new ManagerCarrelli();
        if($managerCarrello->deleteCart($_SESSION['id_profilo'])){
            echo 'Eliminazione avvenuta con successo';
        }else{
            echo "Errore, contatta l'amministratore";
        }
    }
}

?>