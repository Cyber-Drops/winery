<?php

namespace control\utils\recensioni;

use model\ManagerDB;
use model\recensioni\ManagerRecensioni;
use model\recensioni\Recensione;

require_once '../../../model/Config.php';
require_once '../../../model/Item.php';
require_once '../../../model/Crud.php';
require_once '../../../model/Query.php';
require_once '../../../model/ManagrDB.php';
require_once '../../../model/recensioni/ManagerRecensioni.php';

session_start();
if(!isset($_SESSION['loggato'])){
    die('error');
}else{
    $filter = array('name' => FILTER_SANITIZE_FULL_SPECIAL_CHARS, "id" => FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $data = filter_input_array(INPUT_POST,$filter);
    if(in_array(false, $data) || $data['name'] != "approva" && $data['name'] != "cancella"){
        die('error');        
    }else{
        $ManagerDB = new ManagerDB();
        $ManagerRecensioni = new ManagerRecensioni();
        $id = $data['id'];
        }
    if($data['name'] == "approva"){
        $ManagerDB->updateSingle($ManagerRecensioni, $id);
        echo "approvata";
    }else if($data['name'] == "cancella"){
        $ManagerDB->deleteSingle($ManagerRecensioni, $id);
        echo "cancellata";
    }
}

?>