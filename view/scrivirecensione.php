<?php
namespace view;
ob_start();

session_start();
if(isset($_SESSION['loggato'])) {
    $ruolo = $_SESSION['ruolo'];
    $name = $_SESSION['name'];
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
    <script language='javascript' src="../control/scripts/js/myjs/recensioni/recensioni.js"></script>
    <script language='javascript' src="../control/scripts/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../control/scripts/css/struttura.css">
    <title>VINERIA</title>
</head>
<body class="bg-danger bg-gradien">
<div class="container-fluid" style="background-image: url('../media/img/vineria_bg.jpg'); opacity: 0.8;">
        <!--HEADER-->
        <!--ROW0-->
        <div class="row p-1 p-sm-2 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1 header">
            <!--COL3-->
            <div class=" col-sm-1 col-lg-1 col-md-1 col-xl-1 col-xxl-1 rounded-1 text-sm-start text-md-start text-xs-start text-xl-start text-xxl-start">
            </div>
            <!--COL0-->
            <div class="pt-4 col-3 col-sm-3 col-xs-3 col-lg-1 col-md-1 col-xl-3 col-xxl-3 rounded-1 text-sm-start text-md-start text-xs-start text-xl-start text-xxl-start">
                <a href="https://cybertest.altervista.org/vineria/view/home.php"> <img id="bottle"  src="../media/img/bottiglia_home.png" alt="bottiglia_img" > </a>
            </div>
            <!--COL1-->
            <div class="col-8  col-sm-8 col-lg-1 col-md-1 col-xl-5 col-xs-8 col-xxl-5 rounded-1 text-start text-sm-start text-md-end text-xs-end text-xl-start text-xxl-start " > 
                <div>    
                    <span class=" sizeFontStart  text-white fontHeader ">Sorsi d'Eccellenza</span>
                    <span class=" sizeFontSubTitleStart  text-white ">vineria</span>
                </div>    
                <div class=" rounded-1 text-sm-center text-md-center text-xs-center text-xl-start text-xxl-start ">
                    <div class=" sizeFontSubTitleCenter text-white  "><label for="face"> Di Alessandro </label>
                        <img id="face" name="face"  src="../media/img/face_home.png" alt="face_img" > 
                    </div>
                </div>
            </div>
            <!--COL3-->
            <div class=" p-1 col-sm-1 col-lg-1 col-md-1 col-xl-1 col-xxl-1 rounded-1 text-sm-center text-md-center text-xs-center text-xl-start text-xxl-start">
            </div>
            <div class="row p-1 p-sm-1 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1">
                <div class=" col-12 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-12 rounded-1 text-sm-center text-md-center text-xs-center text-xl-start text-xxl-start " >
                        <a href="https://cybertest.altervista.org/vineria/view/home.php#recensioni" class=" px-1 px-xxl-4 text-white " style="text-decoration: none;">RECENSIONI</a>
                        <a href="https://cybertest.altervista.org/vineria/view/prodotti.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">NUOVI PRODOTTI</a>
                        <a href="https://cybertest.altervista.org/vineria/view/contatti.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">CONTATTI</a>
                        <a href="https://cybertest.altervista.org/vineria/view/acquista.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">ACQUISTA</a>
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
            <div class="col-12 col-sm-12 col-lg-4 col-md-12 col-xl-4 col-xs-12 col-xxl-3 rounded-1 ">
            </div>
            <div class="col-12 col-sm-12 col-lg-4 col-md-12 col-xl-4 col-xs-12 col-xxl-6 rounded-1">
                <form id="recensisci" class="form-control text-center">
                    <label for="recensione" class="sizeFontSubTitleCenter form-label text-black">LASCIA UNA RECENSIONE</label>
                    <input class="form-control" type="text" name="nickname" id="nickname" placeholder="inserisci username" pattern="[a-zA-Z]{3,20}" required>
                    <br>
                    <textarea style="resize: none;" class="form-control " name="messaggio" id="messaggio" cols="10" rows="5" maxlength="255" required placeholder="Max character 255"></textarea>
                    <br>
                    <!--
                        STAR RATING
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>
                    -->
                    <input class="btn btn-info" type="submit" value="INVIO">
                    <input class="btn btn-info" type="reset" value="CANCEL">
                </form>
              
            </div>
            <div class="col-12 col-sm-12 col-lg-4 col-md-12 col-xl-4 col-xs-12 col-xxl-3 rounded-1  ">
            </div>
        </div>
         <!--FOOTER-->
        <!--ROW0-->
        <div class="row p-3 p-sm-2 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1 header">
            <div class="row  p-1 p-sm-1 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1">
                <div class=" col-12 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-9 rounded-1 text-sm-center text-md-center text-xs-center text-xl-start text-xxl-start " >
                        <a href="https://cybertest.altervista.org/vineria/view/home.php#recensioni" class=" px-1 px-xxl-4 text-white " style="text-decoration: none;">RECENSIONI</a>
                        <a href="https://cybertest.altervista.org/vineria/view/prodotti.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">PRODOTTI</a>
                        <a href="https://cybertest.altervista.org/vineria/view/contatti.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">CONTATTI</a>
                    </div>
                    <div class=" col-12 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-3 rounded-1 text-sm-center text-md-center text-xs-center text-xl-start text-xxl-start " >
                        <a href="https://cyber-drops.com/" class=" ps-1 px-xxl-4 text-end text-sm-end text-xxl-end text-white " style="text-decoration: none;">AUTHOR: Simone Tempesta</a>
                        <a href="https://cybertest.altervista.org/vineria/view/contributions.php" class=" ps-1 px-xxl-4 text-end text-sm-end text-xxl-end text-white " style="text-decoration: none;">CONTRIBUTIONS</a>
                    </div>
            </div>
        </div>
</div>
</body>
</html>
<?php
ob_end_flush();
?>