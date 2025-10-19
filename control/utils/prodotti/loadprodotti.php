<?php

namespace control\utils\prodotti;

use model\ManagerDB;
use model\prodotti\ManagerProdotti;
use model\prodotti\Prodotto;

require_once '../model/Config.php';
require_once '../model/Item.php';
require_once '../model/Crud.php';
require_once '../model/Query.php';
require_once '../model/ManagrDB.php';
require_once '../model/prodotti/ManagerProdotti.php';
require_once '../model/prodotti/Prodotto.php';

$ManagerDB = new ManagerDB();
$ManagerProdotti = new ManagerProdotti();
$prodottiArr = $ManagerDB->readAll($ManagerProdotti);
?>