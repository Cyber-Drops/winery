<?php

namespace model;

use PDO;

class Config{

    const DSN = "mysql:host=localhost;dbname=my_cybertest;port=3306;charset=utf8";
    const DBUSER = "cybertest";
    const DBPASSWORD = "SIMTEMP8t";
    const PDO_OPTIONS = [
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,
                            PDO::ATTR_EMULATE_PREPARES => false
                        ];

    //SEZIONE PAYPAL DATA
    const PAYPAL_BUISNESS = "venditore_jhon@business.example.com"; //Buisness Account
    const PAYPAL_SANDBOX = TRUE;
    const PAYPAL_SUCCESS_URL = "https://cybertest.altervista.org/vineria/view/ordine_completato.php";
    const PAYPAL_CANCEL_URL = "https://cybertest.altervista.org/vineria/view/ordine_cancellato.php";
    const PAYPAL_VALUTA = "EUR";
    const PAYPAL_URL_SITE = (self::PAYPAL_SANDBOX === true) ? "https://www.sandbox.paypal.com/cgi-bin/webscr" : "https://www.paypal.com/cgi-bin/webscr";

}


?>