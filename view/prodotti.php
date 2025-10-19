<?php
namespace view;

use control\utils\elementihtml\Loadelement;
require_once '../control/utils/elementihtml/LoadElement.php';

ob_start();

$LoadElement = new Loadelement();
$elementiArr  =$LoadElement->readPageElements("prodotti");
session_start();
if(isset($_SESSION['loggato']) && $_SESSION['ruolo'] != 'user') {
    $btnLog = "LOGOUT";
    $logging = $_SESSION['loggato'];
    $ruolo = $_SESSION['ruolo'];
    $stato = $_SESSION['stato'];
    $hiddenElementUser = "hidden";
    //$textAreaEdit = '<textarea class = "textAreaStyle"  maxlength="" name="textAreaEditing" id="textAreaEditing" cols="30" rows="10"></textarea>
      //                  <button class="btn" id="textAreaEditingApply" name="textAreaEditingApply">APPLY</button>';
    $hiddenElementOperator = "";
    $imgDir = scandir("../media/img");
    $vidDir = scandir("../media/video");
}else if(isset($_SESSION['loggato']) && $_SESSION['ruolo'] == "user"){
    $btnLog = "LOGOUT";
    $logging = $_SESSION['loggato'];
    $ruolo = $_SESSION['ruolo'];
    $stato = $_SESSION['stato'];
    $hiddenElementOperator = "hidden";
    $hiddenElementUser = "";
}else {
    $btnLog = "ACCEDI";
    $ruolo = null;
    $stato = null;
    $hiddenElementUser = "";
    $hiddenElementOperator = "hidden";
    $textAreaEdit="";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <script language='javascript' src="../control/scripts/js/anime.min.js"></script>
    <link rel="stylesheet" href="../control/scripts/css/bootstrap.css">
    <link rel="stylesheet" href="../control/scripts/css/myfont.css"><!--MODIFICARE-->
    <script language='javascript' src="../control/scripts/js/jquery.js"></script>
    <script language='javascript' src="../control/scripts/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../control/scripts/css/struttura.css">
    <title>VINERIA</title>
</head>
<body class="bg-danger bg-gradient">
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
                    <span class=" sizeFontStart  text-white fontHeader ">Sorsi d'Eccellenza </span>
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
            <!--ROW SUBMENU-->
            <div class="row p-1 p-sm-1 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1">
                <div class=" col-12 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-12 rounded-1 text-sm-center text-md-center text-xs-center text-xl-start text-xxl-start " >
                        <a href="https://cybertest.altervista.org/vineria/view/home.php#recensioni" class=" px-1 px-xxl-4 text-white " style="text-decoration: none;">RECENSIONI</a>
                        <a href="https://cybertest.altervista.org/vineria/view/contatti.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">CONTATTI</a>
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
       <!--PRODOTTI-->
       <div class="row  p-1 p-sm-1 ">
            <span><h2 class=" sizeFontSubTitleCenter fontbodyTitle text-black" <?=$hiddenElementUser?>><?=$elementiArr[0]->getTesto();?></h2></span>
                <?php
                    if($ruolo !== "user" && $logging === "loggato"){
                        echo '<textarea class = "textAreaStyle" wrap="virtual"  maxlength="25" placeholder="max title character 25" name="'.$elementiArr[0]->getId_elemento().'" id="text'.$elementiArr[0]->getId_elemento().'" cols="5" rows="1">'.$elementiArr[0]->getTesto().'</textarea>
                        <button class="btn" id="'.$elementiArr[0]->getId_elemento().'" name="'.$elementiArr[0]->getId_elemento().'">APPLY</button>';
                        //header("refresh:0");
                    }
                ?>        
            <span ><p class="sizeFontParagraf fontparagrafi fw-bold text-white" <?=$hiddenElementUser?>><?=$elementiArr[1]->getTesto();?></p>
                    </span>
                    <?php
                    if($ruolo !== "user" && $logging === "loggato"){
                        echo '<textarea class = "textAreaStyle" wrap="virtual"  maxlength="1500" placeholder="max title character 25" name="'.$elementiArr[1]->getId_elemento().'" id="text'.$elementiArr[1]->getId_elemento().'" cols="30" rows="10">'.$elementiArr[1]->getTesto().'</textarea>
                        <button class="btn" id="'.$elementiArr[1]->getId_elemento().'" name="'.$elementiArr[1]->getId_elemento().'">APPLY</button>';
                        //header("refresh:0");
                    }
                ?>
        </div>
        <!--ROW1 CARD-->
        <div class="row p-1 p-sm-2 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1">
            <!--COL0-->
            <div class="col-sm-4 col-lg-12 col-md-12 col-xl-4 col-xs-3 col-xxl-2 rounded-1  " style=" height: fit-content;">
                <div class="card" style="width: 100%;">
                <img src="<?=$elementiArr[2]->getFile_src();?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text sizeFontParagraf" <?=$hiddenElementUser?>><?=$elementiArr[2]->getTesto();?></p>
                            <?php
                                if($ruolo !== "user" && $logging === "loggato"){
                                    //echo var_dump($imgDir);
                                    echo '<textarea class = "textAreaStyle " wrap="virtual"  maxlength="300" placeholder="max title character 25" name="'.$elementiArr[2]->getId_elemento().'" id="text'.$elementiArr[2]->getId_elemento().'" cols="24" rows="5">'.$elementiArr[2]->getTesto().'</textarea>
                                    <select name="option'.$elementiArr[2]->getId_elemento().'" id="option'.$elementiArr[2]->getId_elemento().'">';
                                    foreach($imgDir as $path){
                                        //../media/img/wine-barrel.jpg
                                        if($path === "." || $path === "..") continue;
                                        $pathCompleta = trim("../media/img/".$path);
                                        if($pathCompleta == trim($elementiArr[2]->getFile_src())){
                                            $htmlOption = "<option value=".$pathCompleta." selected>".$path."</option>";
                                        }else{
                                            $htmlOption = "<option value=".$pathCompleta.">".$path."</option>";
                                        }
                                        echo $htmlOption;
                                    }
                                    echo '</select> 
                                    <button class="btn righ d-flex-fill" id="'.$elementiArr[2]->getId_elemento().'" name="'.$elementiArr[2]->getId_elemento().'">APPLY</button>';
                                    //header("refresh:0");
                                }
                            ?>
                        </div>
                </div>    
            </div>
            <!--COL2-->
            <div class="col-sm-4 col-lg-12 col-md-12 col-xl-4 col-xs-3 col-xxl-2 rounded-1  "  style="object-fit: fill;">
                <div class="card" style="width: 100%; object-fit: fill;">
                    <img src="../media/img/bottiglia_vino.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text sizeFontParagraf">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                 Quidem quibusdam id provident fugiat eum maxime optio numquam vitae, 
                            </p>
                        </div>
                </div>
            </div>
            <!--COL1-->
            <div class="col-sm-4 col-lg-12 col-md-12 col-xl-4 col-xs-3 col-xxl-2 rounded-1 " > 
                <div class="card" style="width: 100%; height: fit-content;">
                    <img src="../media/img/bottiglia_vino.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text sizeFontParagraf">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                 Quidem quibusdam id provident fugiat eum maxime optio numquam vitae, 
                            </p>
                        </div>
                </div>
            </div>   
            <!--COL1-->
            <div class="col-sm-4 col-lg-12 col-md-12 col-xl-4 col-xs-3 col-xxl-2 rounded-1 " > 
                <div class="card" style="width: 100%; height: fit-content;">
                    <img src="../media/img/bottiglia_vino.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text sizeFontParagraf">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                 Quidem quibusdam id provident fugiat eum maxime optio numquam vitae, 
                            </p>
                        </div>
                </div>
            </div>   
            <!--COL1-->
            <div class="col-sm-4 col-lg-12 col-md-12 col-xl-4 col-xs-3 col-xxl-2 rounded-1 " > 
                <div class="card" style="width: 100%; height: fit-content;">
                    <img src="../media/img/bottiglia_vino.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text sizeFontParagraf">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                 Quidem quibusdam id provident fugiat eum maxime optio numquam vitae, 
                            </p>
                        </div>
                </div>
            </div>   
            <!--COL1-->
            <div class="col-sm-4 col-lg-12 col-md-12 col-xl-4 col-xs-3 col-xxl-2 rounded-1 " > 
                <div class="card" style="width: 100%; height: fit-content;">
                    <img src="../media/img/bottiglia_vino.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text sizeFontParagraf">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                 Quidem quibusdam id provident fugiat eum maxime optio numquam vitae, 
                            </p>
                        </div>
                </div>
            </div>   
        </div>
     <!--FOOTER-->
        <!--ROW0-->
        <div class="row p-3 p-sm-2 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1 header">
            <div class="row p-1 p-sm-1 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1">
                <div class=" col-12 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-9 rounded-1 text-sm-center text-md-center text-xs-center text-xl-start text-xxl-start " >
                        <a href="https://cybertest.altervista.org/vineria/view/home.php#recensioni" class=" px-1 px-xxl-4 text-white " style="text-decoration: none;">RECENSIONI</a>
                        <a href="https://cybertest.altervista.org/vineria/view/contatti.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">CONTATTI</a>
                    </div>
                    <div class=" col-12 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-3 rounded-1 text-sm-center text-md-center text-xs-center text-xl-start text-xxl-start " >
                        <a href="https://cyber-drops.com/" class=" ps-1 px-xxl-4 text-end text-sm-end text-xxl-end text-white " style="text-decoration: none;">AUTHOR: cyber-drops</a>
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