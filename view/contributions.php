<?php
namespace view;
ob_start();
session_start();
if(isset($_SESSION['loggato'])) {
    $btnLog = "LOGOUT";
    $ruolo = $_SESSION['ruolo'];
    $stato = $_SESSION['stato'];
}else {
    $btnLog = "ACCEDI";
    $ruolo = null;
    $stato = null;
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
    <script language='javascript' src="../control/scripts/js/jquery.js"></script>
    <script language='javascript' src="../control/scripts/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../control/scripts/css/struttura.css">
    <link rel="stylesheet" href="../control/scripts/css/myfont.css">
    <title>VINERIA</title>
</head>
<body class="bg-danger bg-gradien">
    <div class="container-fluid h-100" style="background-image: url('../media/img/vineria_bg.jpg'); opacity: 0.7;">
        <!--HEADER-->
        <!--ROW0-->
        <div class="row  p-1 p-sm-2 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1 header">
            <!--COL1-->
            <div class="col-12  col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-12 rounded-1 text-center text-sm-center text-md-center text-xs-center text-xl-center text-xxl-center " > 
                <div>    
                    <span class=" sizeFont  text-white fontHeader ">LX SOXXXXXE DXL XXXO <br> CONTRIBUTIONS</span>
                </div>    
            </div>
            <!--COL3-->
            <div class=" p-1 col-sm-1 col-lg-1 col-md-1 col-xl-1 col-xxl-1 rounded-1 text-sm-center text-md-center text-xs-center text-xl-start text-xxl-start">
            </div>
            <div class="row p-1 p-sm-1 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1">
                <div class=" col-12 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-12 rounded-1 text-sm-center text-md-center text-xs-center text-xl-start text-xxl-start " >
                        <a href="https://cybertest.altervista.org/vineria/view/home.php" class=" px-1 px-xxl-4 text-white " style="text-decoration: none;">HOME</a>
                        <a href="https://cybertest.altervista.org/vineria/view/home.php#recensioni" class=" px-1 px-xxl-4 text-white " style="text-decoration: none;">RECENSIONI</a>
                        <a href="https://cybertest.altervista.org/vineria/view/prodotti.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">NUOVI PRODOTTI</a>
                        <a href="https://cybertest.altervista.org/vineria/view/contatti.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">CONTATTI</a>
                        <a href="https://cybertest.altervista.org/vineria/view/scrivirecensione.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">RECENSISCI</a>
                        <a href="https://cybertest.altervista.org/vineria/view/acquista.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">ACQUISTA</a>
                        <?php
                            if($ruolo !== null && $stato !== null){
                                echo '<a class=" text-white align-content-end align-items-end" style="text-decoration: none; float: right;">'.$ruolo.'</a>';
                                //header("refresh:0");
                            }
                        ?>
                </div>
            </div>
        </div>
        <div class="row p-1">
            <div class="col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-4 rounded-1 text-center ">
                    <h4><span class="badge bg-secondary ">
                        <a href="https://www.flaticon.com/free-icons/phone" title="phone icons" class="text-white">Phone icons created by iconmas - Flaticon</a>
                    </span></h4>
            </div>
            <div class="col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-4 rounded-1 text-center">
                <h4> <span class="badge bg-secondary">
                    <a href="https://www.flaticon.com/free-icons/email" title="email icons" class="text-white">Email icons created by lakonicon - Flaticon</a>
                </span></h4>
            </div>
            <div class="col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-4 rounded-1 text-center">
                <h4> <span class="badge bg-secondary">
                    <a href="https://www.flaticon.com/free-icons/map" title="map icons" class="text-white">Map icons created by Freepik - Flaticon</a>
                </span></h4>
            </div>
            <div class="col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-4 rounded-1 text-center">
                <h4> <span class="badge bg-secondary">
                    <a href="https://www.dafont.com/it/mjtype.d10200" title="map icons" class="text-white">Font Holland Land by mjtype - DaFont</a>
                </span></h4>
            </div>
            <div class="col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-4 rounded-1 text-center">
                <h4> <span class="badge bg-secondary">
                    <a href="https://www.dafont.com/it/matt-wilson.d7009" title="map icons" class="text-white">Font Geizer - DaFont</a>
                </span></h4>
            </div>
            <div class="col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-4 rounded-1 text-center">
                <h4> <span class="badge bg-secondary">
                    <a href="https://www.dafont.com/it/fontfabric.d2165" title="map icons" class="text-white">Font Mont by fontfabric - DaFont</a>
                </span></h4>
            </div>
        </div>
    </div>
</body>
</html>
<?php
ob_end_flush();
?>