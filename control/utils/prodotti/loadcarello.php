<?php

namespace control\utils\prodotti;

use model\carrelli\ManagerCarrelli;
use model\ManagerDB;
use model\carrelli\Carrello;

require_once '../model/Config.php';
require_once '../model/Item.php';
require_once '../model/Crud.php';
require_once '../model/Query.php';
require_once '../model/ManagrDB.php';
require_once '../model/carrelli/Carrello.php';
require_once '../model/carrelli/ManagerCarrelli.php';

$ManagerDB = new ManagerDB();
$ManagerCarrelli = new ManagerCarrelli();
session_start();
//$prodottiArr = $ManagerDB->readAllWhere($ManagerCarrelli, $_SESSION['id_profilo']);
$prodottiArr = $ManagerCarrelli->readMyCart($_SESSION['id_profilo']);
?>