<?php
//Tutti i prodotti acquistabili, costruita tramite informazioni recuperate dal db

namespace view;
session_start();
if(!isset($_SESSION['loggato'])){
    //echo "<script>alert('utente non autenticato, eseguire login')</script>";
    header("Location:./home.php");
    exit();
}else{
    $name = $_SESSION['name'];
    $ruolo = $_SESSION['ruolo'];

require_once '../control/utils/prodotti/loadprodotti.php';
require_once '../model/Config.php';
require_once '../model/Item.php';
require_once '../model/Crud.php';
require_once '../model/Query.php';
require_once '../model/ManagrDB.php';
require_once '../model/carrelli/ManagerCarrelli.php';
require_once '../model/carrelli/Prodotto.php';
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
<div class="container-fluid " >
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
                    <div class=" sizeFontSubTitleCenter text-white  "><label> Di Alessandro </label>
                        <img id="face" name="face"  src="../media/img/face_home.png" alt="face_img" > 
                    </div>
                </div>
            </div>
            <!--COL3-->
            <div class=" p-1 col-sm-1 col-lg-1 col-md-1 col-xl-1 col-xxl-1 rounded-1 text-sm-center text-md-center text-xs-center text-xl-start text-xxl-start">
            </div>
            <div class="row  p-1 p-sm-1 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1">
                <div class=" col-12 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-12 rounded-1 text-sm-center text-md-center text-xs-center text-xl-start text-xxl-start " >
                        <a href="#recensioni" class=" px-1 px-xxl-4 text-white " style="text-decoration: none;">RECENSIONI</a>
                        <a href="https://cybertest.altervista.org/vineria/view/prodotti.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">NUOVI PRODOTTI</a>
                        <a href="https://cybertest.altervista.org/vineria/view/contatti.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">CONTATTI</a>
                        <a href="https://cybertest.altervista.org/vineria/view/scrivirecensione.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">RECENSISCI</a>
                        <button type="submit" class="btn btn-primary" id="show_cart" name="show_cart"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg>
                        </button>
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
    <div class="row p-1 p-sm-2 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1" name="content_acquista" id="content_acquista">
<?php

foreach($prodottiArr as $Prodotto){
            $scorte = $Prodotto->getScorte() > 10 ? $Prodotto->getScorte() : "IN ESAURIMENTO";
            echo'<div class="  p-3 col-sm-4 col-lg-12 col-md-12 col-xl-4 col-xs-3 col-xxl-2 rounded-1  " style=" height: fit-content;">
                    <div class="card" style="width: 100%;">
                    <img src="'.$Prodotto->getImg().'" class="card-img-top " alt="...">
                        <div class="card-body">
                            <h5 class="card-title">'.$Prodotto->getNome().' &euro;'.$Prodotto->getPrezzo().' cad.</h5>
                            <p class="card-text sizeFontParagraf">'.$Prodotto->getDescrizione().'</p>
                            <p class="card-text sizeFontParagraf">Pz '.$scorte.'</p>
                        <div>
                            <select name="qta" id="qta_'.$Prodotto->getId().'">
                            <option value="1" selected="selected">1</option>"';
                            for($i=2; $i<10; $i++){
                                echo "<option value=".$i.">".$i."</option>";
                            }
                            echo '</select>
                            <button class="btn btn-outline-primary" type="submit" id="addprodotto_'.$Prodotto->getId().'" name="addprodotto_'.$Prodotto->getId().'" >AGGIUNGI/MODIFICA QUANTITA</button>
                        </div>
                        </div>
                    </div>    
                </div>';
    }
?>
    </div>
     <!--FOOTER-->
        <!--ROW0-->
        <div class="row p-3 p-sm-2 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1 header">
            <div class="row  p-1 p-sm-1 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1">
                <div class=" col-12 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-9 rounded-1 text-sm-center text-md-center text-xs-center text-xl-start text-xxl-start " >
                <a href="https://cybertest.altervista.org/vineria/view/home.php#recensioni" class=" px-1 px-xxl-4 text-white " style="text-decoration: none;">RECENSIONI</a>
                        <a href="https://cybertest.altervista.org/vineria/view/prodotti.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">PRODOTTI</a>
                        <a href="https://cybertest.altervista.org/vineria/view/scrivirecensione.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">RECENSISCI</a>
                        <a href="https://cybertest.altervista.org/vineria/view/contatti.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">CONTATTI</a>
                    </div>
                    <div class=" col-12 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-3 rounded-1 text-sm-center text-md-center text-xs-center text-xl-start text-xxl-start " >
                        <a href="https://cyber-drops.com/" class=" ps-1 px-xxl-4 text-end text-sm-end text-xxl-end text-white " style="text-decoration: none;">AUTHOR: Simone Tempesta</a>
                        <a href="https://cybertest.altervista.org/vineria/view/contributions.php" class=" ps-1 px-xxl-4 text-end text-sm-end text-xxl-end text-white " style="text-decoration: none;">CONTRIBUTIONS</a>
                    </div>
            </div>
        </div>

</div>
<script>
    /*
    function testButtonEvent(){
        alert("click");
    }
    */
   $(document).ready(function() {
        function show_cart(){
            //$('#content_acquista').load('./cart.php');
            window.location = 'cart.php';
        }
        function addToCart(id){
            var link = "../control/utils/prodotti/aggiungi_a_carrello.php?";
            var id_prodotto = id.split("_");
            var qta = $("#qta_"+id_prodotto[1]).val();
            link = link+"id="+id_prodotto[1]+"&qta="+qta;
            $.get(link, function(data){
                if(data === 'ok'){
                    alert("Prodotto aggiunto al carrello");
                }else{
                    alert("Errore"+data);
                }
            });
        }

        $('button').click(function(evt){
            evt.preventDefault();
            var btn = $(this).attr('name');
            if(btn === 'show_cart'){
                show_cart();
            }else if(btn.split("_")[0] === 'addprodotto'){
                    addToCart($(this).attr('id'));
            }
        });
   });

</script>
</body>
</html>