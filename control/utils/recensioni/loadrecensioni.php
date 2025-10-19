<?php

namespace control\utils\recensioni;

use model\ManagerDB;
use model\recensioni\ManagerRecensioni;
use model\recensioni\Recensione;

require_once '../model/Config.php';
require_once '../model/Item.php';
require_once '../model/Crud.php';
require_once '../model/Query.php';
require_once '../model/ManagrDB.php';
require_once '../model/recensioni/ManagerRecensioni.php';
require_once '../model/recensioni/Recensione.php';

$ManagerDB = new ManagerDB();
$ManagerRecensioni = new ManagerRecensioni();
$Recensione  = new Recensione();
$Recensione->setNickname($form_data['nickname']);
$Recensione->setMessaggio($form_data['messaggio']);
if(isset($_SESSION['loggato']) && in_array($_SESSION['ruolo'], $GLOBALS['operatoriRecensioniArr'])){
    $recensioniArr = $ManagerDB->readAll($ManagerRecensioni);
    //inserisci nel db dopo sanificazione illegal words
}else{
    $pk = "revisionata";
    $recensioniArr = $ManagerDB->readAllWhere($ManagerRecensioni, $pk);
    //$ManagerRecensioni->readAllApproved();
}
    


?>