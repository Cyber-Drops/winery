<?php

namespace control\utils\elementihtml;

use model\elementihtml\ManagerElementiHtml;
use model\ManagerDB;

require_once '../../../model/Config.php';
require_once '../../../model/Item.php';
require_once '../../../model/Crud.php';
require_once '../../../model/Query.php';
require_once '../../../model/ManagrDB.php';
require_once '../../../model/elementihtml/ManagerElementiHtml.php';
session_start();
if(!isset($_SESSION['loggato'])){
    echo "Errore";
    die('error');
}else{
    $filter = array('testo' => FILTER_SANITIZE_FULL_SPECIAL_CHARS, 'file_src' => FILTER_SANITIZE_FULL_SPECIAL_CHARS, 'id_element' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,'pageName' => FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $data = filter_input_array(INPUT_POST,$filter, true);
    if(in_array(false, $data)){
        echo "Errore";
        //die('error');        
    }else{
        $ManagerDB = new ManagerDB();
        $ManagerElementiHtml = new ManagerElementiHtml();
        $testo = $data['testo'];
        $file_src = $data['file_src'];
        $pageName = $data['pageName'];
        $id_element = $data['id_element'];

        if($ManagerElementiHtml->updateSingleElement($testo, $file_src, $pageName, $id_element) === true){
            echo "modificato";
        }else{
            echo "ERRORE QUERY";
        }
    }
    
}

?>