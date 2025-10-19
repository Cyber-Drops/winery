<?php

namespace view;

use function control\utils\prodotti\deleteCart;

ob_start();
session_start();
if(!isset($_SESSION['loggato'])){
    //echo "<script>alert('utente non autenticato, eseguire login')</script>";
    header("Location:./home.php");
    exit();
}else{
    $ruolo = $_SESSION['ruolo'];
    $stato = $_SESSION['stato'];
    $name = $_SESSION['name']; 
    header('Refresh:10; url=home.php');
}
if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cc']) && !empty($_GET['st'])){
    $item_number = $_GET['item_number'];  
    $txn_id = $_GET['tx']; 
    $payment_gross = $_GET['amt']; 
    $currency_code = $_GET['cc']; 
    $payment_status = $_GET['st'];
}
require_once '../control/library/fpdf/fpdf.php';
use control\library\FPDF;

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../media/img/logoVineria.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'SORSI D\'ECCELLENZA',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,"DESCRIZIONE: ".$item_number,0,1);
$pdf->Cell(0,10,"TRANSAZIONE NUMERO: ".$txn_id,0,1);
$pdf->Cell(0,10,"AMMONTARE: ".$item_number,0,1);
$pdf->Cell(0,10,"STATO: ".$payment_status,0,1);
$pdf->Output("F","../invoces/transazione_".$txn_id."pdf",true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="../control/scripts/css/bootstrap.css">
    <link rel="stylesheet" href="../control/scripts/css/myfont.css"><!--MODIFICARE-->
    <script language='javascript' src="../control/scripts/js/jquery.js"></script>
    <script language='javascript' src="../control/scripts/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../control/scripts/css/struttura.css">
    <title>VINERIA</title>

</head>
<body class="bg-danger bg-gradient" >
<div class="container-fluid p-5"  >
    <!--HEADER-->
        <!--ROW0-->
        <div class="row  p-1 p-sm-2 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1 header">
                <div class="col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xxl-12 rounded-1 text-center">
                    <table class="table table-success table-bordered border-primary">
                        <thead>
                            <tr>
                                <th scope="row">
                                    <div>    
                                        <span class=" sizeFontSubTitleCenter text-black fontHeader ">Sorsi d'Eccellenza </span>
                                        <span class=" sizeFontSubTitleCenter text-black ">vineria</span>
                                    </div>    
                                    <div class=" rounded-1 text-sm-center text-md-center text-center ">
                                        <div class=" sizeFontSubTitleCenter text-white  "><label> Di Alessandro </label>
                                            <img id="face" name="face"  src="../media/img/face_home.png" alt="face_img" > 
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row " class="fontparagrafi sizeFontParagrafCenter p-3" >ORDINE COMPLETATO</th>
                            </tr>
                            <tr>
                                <td class="fontparagrafi sizeFontParagrafCenter  p-3">
                                    Transizione effettuata con successo. I dettagli del pagamento saranno recapitati al tuo indirizzo email. <br>
                                    Grazie per aver effettuato effettuato il pagamento. <br> Accedi al tuo account PayPal per vedere i dettagli della transizione.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="https://cybertest.altervista.org/vineria/view/home.php">CLICCA SE NON VIENI REINDIRIZZATO ALLA HOME PAGE</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php
require_once '../control/utils/prodotti/delete_carrello.php';
deleteCart();

ob_end_flush();
?>