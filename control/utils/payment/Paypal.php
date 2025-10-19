<?php

namespace control\utils\payment;

use model\Config;

class Paypal {

    static function buildPayPalForm(float $amount, string $nickname){
        $item_name = "Totale Acquisto di ".$nickname;
        $item_number = "Ordine Del ".date("Y-m-d");
    ?>
    <div class="row">
        <form action="<?=Config::PAYPAL_URL_SITE?>" method="post">
            <input type="hidden" name="business" value="<?=Config::PAYPAL_BUISNESS?>">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="currency_code" value="<?=Config::PAYPAL_VALUTA?>">
            <input type="hidden" name="amount" value="<?=$amount?>">
            <input type="hidden" name="item_name" value="<?=$item_name?>">
            <input type="hidden" name="item_number" value="<?=$item_number?>">
            <input type="hidden" name="return" value="<?=Config::PAYPAL_SUCCESS_URL?>">
            <input type="hidden" name="return_cancel" value="<?=Config::PAYPAL_CANCEL_URL?>">
            <button class="btn btn-primary" type="submit">PAGA</button>
        </form>
    </div>
    <?php
    }
}

?>