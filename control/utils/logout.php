<?php
namespace control\utils;
session_start();
//Aggiungere controllo sulla sessione che lo script venga chiamato solo da un operatore loggato
$_SESSION['loggato'] ='';
$_SESSION['stato'] ='';
$_SESSION['ruolo'] ='';
session_unset();




?>