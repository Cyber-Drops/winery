<?php
namespace control\utils;

use model\ManagerDB;
use model\operatori\ManagerOperatori;
use model\operatori\Operatore;
use model\profilo\ManagerProfili;

require_once '../../model/Item.php';
require_once '../../model/Crud.php';
require_once '../../model/Query.php';
require_once '../../model/Config.php';
require_once '../../model/ManagrDB.php';
require_once '../../model/operatori/Operatore.php';
require_once '../../model/operatori/ManagerOperatori.php';
require_once '../../model/profilo/Profilo.php';
require_once '../../model/profilo/ManagerProfili.php';


$filter = array('username' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'password' => array('filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/[a-zA-Z0-9]{3,20}/')));

$form_data = filter_input_array(INPUT_POST, $filter);
if(in_array(false, $form_data)){
    echo "input non valido";
    header("refresh:3, url: ../../view/home.php");
    exit();
}else{
    //verfifica utenze su db
    $nickname = $form_data['username'];
    $password = $form_data['password'];
    $ManagerDB = new ManagerDB();
    $managerOperatori = new ManagerOperatori();
    $managerProfili = new ManagerProfili();
    $operatori =$managerOperatori->login($nickname, $password);
    $profili = $managerProfili->login($nickname, $password);
    if(empty($operatori) && empty($profili)){
        header("refresh:3, url:home.php");
        return false;
    }else if(empty($operatori)){
        session_start();
            $_SESSION['loggato'] = "loggato";
            $_SESSION['ruolo'] = "user";
            $_SESSION['id_profilo'] = $profili[0]->getUserId();
            $_SESSION['name'] = $profili[0]->getUsername();
            $_SESSION['stato'] = $profili[0]->getStato();
            //header("Location:../../view/contatti.php");
            echo true;
            //echo "test";
            //echo var_dump($profili[0]);
            //echo var_dump($operatori[0]->getRuolo()); //
    }else {
            //exit();//ELIMINARE
            session_start();
            $_SESSION['loggato'] = "loggato";
            $_SESSION['ruolo'] = $operatori[0]->getRuolo();
            $_SESSION['name'] = $operatori[0]->getNickname();
            $_SESSION['stato'] = $operatori[0]->getStato();
            //header("Location:../../view/contatti.php");
            echo true;
            //echo var_dump($operatori[0]->getRuolo()); //
    }
    return false;
    
}

?>