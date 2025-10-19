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
require_once '../../../model/recensioni/Recensione.php';

$filter = array('nickname'=>FILTER_SANITIZE_SPECIAL_CHARS,'messaggio'=>FILTER_SANITIZE_SPECIAL_CHARS);

$form_data = filter_input_array(INPUT_POST, $filter);

if(in_array(false, $form_data)){
    echo "input non valido";
    header('Refresh:3, url:../../../view/home.php');
}else{
    $ManagerDB = new ManagerDB();
    $ManagerRecensioni = new ManagerRecensioni();
    $Recensione  = new Recensione();
    $Recensione->setNickname($form_data['nickname']);
    $Recensione->setMessaggio($form_data['messaggio']);
    $ManagerDB->insert($ManagerRecensioni, $Recensione);
    echo "ok";
    //inserisci nel db dopo sanificazione illegal words
}


?>