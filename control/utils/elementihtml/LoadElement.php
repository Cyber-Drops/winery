<?php
namespace control\utils\elementihtml;

use model\elementihtml\ManagerElementiHtml;
use model\ManagerDB;

require_once '../model/Config.php';
require_once '../model/Item.php';
require_once '../model/Crud.php';
require_once '../model/Query.php';
require_once '../model/ManagrDB.php';
require_once '../model/elementihtml/ManagerElementiHtml.php';
require_once '../model/elementihtml/Elementohtml.php';

class  Loadelement {

    private $ManagerDB;
    private $ManagerElementiHtml;

    function __construct() {
        $this->ManagerDB = new ManagerDB();
        $this->ManagerElementiHtml = new ManagerElementiHtml();
    }


    function readPageElements(string $pageName): array{
       return $this->ManagerDB->readAllWhere($this->ManagerElementiHtml, $pageName);
    }

}


?>