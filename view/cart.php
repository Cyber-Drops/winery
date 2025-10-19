<?php
session_start();
if (!isset($_SESSION['loggato'])){
    header('Location:./home.php');
    exit();
}else{
    $name = $_SESSION['name'];
    $ruolo = $_SESSION['ruolo'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <script language='javascript' src="../control/scripts/js/anime.min.js"  ></script>
    <link rel="stylesheet" href="../control/scripts/css/bootstrap.css">
    <link rel="stylesheet" href="../control/scripts/css/myfont.css"><!--MODIFICARE-->
    <script language='javascript' src="../control/scripts/js/jquery.js"></script>
    <script language='javascript' src="../control/scripts/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../control/scripts/css/struttura.css">
    <title>VINERIA</title>

</head>

<body class="bg-danger bg-gradient" >
<div class="container-fluid" >
        <!--HEADER-->
        <!--ROW0-->
        <div class="row  p-1 p-sm-2 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1 header">
            <!--COL3-->
            <div class=" col-sm-1 col-lg-1 col-md-1 col-xl-1 col-xxl-1 rounded-1 text-sm-start text-md-start text-xs-start text-xl-start text-xxl-start">
            </div>
            <!--COL0-->
            <div class="pt-4 col-3 col-sm-3 col-xs-3 col-lg-3 col-md-3 col-xl-3 col-xxl-3 rounded-1 text-sm-start text-md-start text-xs-start text-xl-start text-xxl-start">
                <a href="#"> <img id="bottle"  src="../media/img/bottiglia_home.webp" alt="bottiglia_img" > </a>
            </div>
            <!--COL1-->
            <div class="col-8  col-sm-8 col-lg-5 col-md-5 col-xl-5 col-xs-8 col-xxl-5 rounded-1 text-start text-sm-start text-md-end text-xs-end text-xl-start text-xxl-start " > 
                <div>    
                    <span class=" sizeFontStart  text-white fontHeader ">Sorsi d'Eccellenza </span>
                    <span class=" sizeFontSubTitleStart  text-white ">vineria</span>
                </div>    
                <div class=" rounded-1 text-sm-center text-md-center text-xs-center text-xl-start text-xxl-start ">
                    <div class=" sizeFontSubTitleCenter text-white  ">
                    <h1  class=" sizeFontStart  text-black fontHeader ">DETTAGLI CARRELLO</h1>
                    </div>
                </div>
            </div>
            <!--COL3-->
            <div class=" p-1 col-sm-1 col-lg-1 col-md-1 col-xl-1 col-xxl-1 rounded-1 text-sm-center text-md-center text-xs-center text-xl-start text-xxl-start">
            </div>
            <div class="row  p-1 p-sm-1 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1">
                <div class=" col-12 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-12 rounded-1 text-sm-center text-md-center text-xs-center text-xl-start text-xxl-start " >
                        <a name="link" href="https://cybertest.altervista.org/vineria/view/home.php#recensioni" class=" px-1 px-xxl-4 text-white " style="text-decoration: none;">RECENSIONI</a>
                        <a name="link" href="https://cybertest.altervista.org/vineria/view/prodotti.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">NUOVI PRODOTTI</a>
                        <a name="link" href="https://cybertest.altervista.org/vineria/view/contatti.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">CONTATTI</a>
                        <a name="link" href="https://cybertest.altervista.org/vineria/view/scrivirecensione.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">RECENSISCI</a>
                        <?php
                            if($ruolo !== null && $name !== null){
                                $labelUtente = $ruolo." ".$name;
                                echo '<a class=" text-white align-content-end align-items-end" style="text-decoration: none; float: right;">'.$labelUtente.'</a>';
                                //header("refresh:0");
                            }
                        ?>
                    </div>
            </div>
        </div>
    <div class="row p-1 p-sm-2 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1">

<?php

use control\utils\payment\Paypal;

require_once '../control/utils/prodotti/loadcarello.php';
require_once '../control/utils/payment/Paypal.php';
//echo var_dump($prodottiArr);
$totale = 0;
foreach($prodottiArr as $prodotto){
    $totale += $prodotto["costo_complessivo"];
    //echo $prodotto['id_item_carrello'];
    echo'
            <div class="  p-3 col-sm-4 col-lg-12 col-md-12 col-xl-4 col-xs-3 col-xxl-3 rounded-1  " style=" height: fit-content;">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">'.$prodotto["nome"].' &euro;'.$prodotto["prezzo"].'</h5>
                        <p class="card-text sizeFontParagraf">'.$prodotto["qta"].'</p>
                        <p class="card-text sizeFontParagraf">'.$prodotto["costo_complessivo"].'</p>
                        <button class="btn btn-outline-primary"><a href="#" style="text-decoration: none;" name="delete_'.$prodotto["id_item_carrello"].'">delete</a></button>
                        <button class="btn btn-outline-primary"><a href="#" style="text-decoration: none;" name="min">-</a></button>
                    </div>
                </div> 
            </div>
        ';
    }
?>
    <div class="row d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1">
        <div class="  p-3 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-12 rounded-1 text-center " >
            <p style="font-size: x-large; font-weight: bold;">Totale: <?=$totale?></p>
        </div>
        <div class="  p-3 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-12 rounded-1 text-center " >
            <button class="btn btn-primary "><a href="https://cybertest.altervista.org/vineria/view/acquista.php" class="text-white" name="continuaacquisti" style="text-decoration: none;">CONTINUA ACQUISTI</a></button>
            <?=Paypal::buildPayPalForm($totale, $name)?>
        </div>
        <?=$nickname?>
        <?=$totale?>
    </div>
</div>
</body>
</html>
<script>
    $('a').click(function(evt){                
                evt.preventDefault();
                var href = $(this).attr('name').split('_')[0];
                var id = $(this).attr('name').split('_')[1];
                if(href === 'delete'){
                    alert("delete") 
                    $.get("../control/utils/prodotti/delete_prodotto_carrello.php?id="+id, function(data) {
                        location.reload(true);
                    });
                }else if(href === 'continuaacquisti'){
                    window.location = 'acquista.php';
                }else if(href === 'inviaordine'){
                    //window.location = 'invia_ordine.php';//PAY PAL
                }else{
                    window.location = $(this).attr('href');
                }
            });
</script>

