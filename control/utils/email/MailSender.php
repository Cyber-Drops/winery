<?php

namespace control\utils\email;

class MailSender {
    private $emailSito = "simtemp8@gmail.com";
    private $EMAIL_TEMPLATE = "";

    function __construct()
    {
        $file_open = fopen('../email/emailtemplate.phtml', 'r');
        while(!feof($file_open)){
            $this->EMAIL_TEMPLATE .= fgets($file_open);
        }
        fclose($file_open);
    }
    function send_email_infoMail(string $emailSender,string $nickname ,string $messaggio){
        $testo_email = sprintf($this->EMAIL_TEMPLATE, $nickname, $messaggio);
        $headers = "From: vineriaXXX<simtemp8@gmail.com>\r\n";
        $headers.= "Mime-Version: 1.0\r\n";
        $headers.= "Content-Type: text/html; charset=UTF-8\r\n";
        mail($this->emailSito,"Informazioni dal form di contatto", $testo_email, $headers);
    }

}

?>