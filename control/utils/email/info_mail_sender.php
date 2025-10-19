<?php

namespace control\utils\email;

use control\utils\email\MailSender;
use Exception;

require_once '../email/MailSender.php';

$filter = array('email' => FILTER_SANITIZE_FULL_SPECIAL_CHARS, 'nickname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS, 'messaggio'=> FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$form_data = filter_input_array(INPUT_POST, $filter);
if(in_array(false, $form_data)){
    echo 'ko';
    exit();
}
try{
    $MailSender = new MailSender();
    //$MailSender->send_email_infoMail($form_data['email'], $form_data['nickname'], $form_data['messaggio']);
    echo 'ok';

}catch(Exception $exception){
    exit($exception->getMessage());
}

?>