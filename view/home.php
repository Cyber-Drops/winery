<?php
namespace view;

use control\utils\elementihtml\Loadelement;
require_once '../control/utils/elementihtml/LoadElement.php';

ob_start();

$LoadElement = new Loadelement();
$elementiArr  =$LoadElement->readPageElements("home");
session_start();
if(isset($_SESSION['loggato']) && $_SESSION['ruolo'] != 'user') {
    $btnLog = "LOGOUT";
    $logging = $_SESSION['loggato'];
    $ruolo = $_SESSION['ruolo'];
    $stato = $_SESSION['stato'];
    $name = $_SESSION['name']; 
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
    $name = $_SESSION['name'];
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
    <script language='javascript' src="../control/scripts/js/anime.min.js"  ></script>
    <link rel="stylesheet" href="../control/scripts/css/bootstrap.css">
    <link rel="stylesheet" href="../control/scripts/css/myfont.css"><!--MODIFICARE-->
    <script language='javascript' src="../control/scripts/js/jquery.js"></script>
    <script language='javascript' src="../control/scripts/js/myjs/logging.js"></script> <!--jquery logging -->
    <script language='javascript' src="../control/scripts/js/myjs/recensioni/recensioni.js"></script> 
    <script language='javascript' src="../control/scripts/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../control/scripts/css/struttura.css">
    <title>VINERIA</title>

</head>
<body class="bg-danger bg-gradient" >
<div class="container-fluid"  >
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
            <!--COL2-->
            <div class="col-12  col-sm-12 col-lg-12 col-md-12 col-xl-2 col-xs-12 col-xxl-2 rounded-1 text-start text-sm-start text-md-center text-xs-center text-xl-start text-xxl-start " >
                    <div class=" dropdown   text-start-0">
                        <button  class="img-fluid btn btn-dark dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                        <ul class="dropdown-menu text-start bg-black">
                        <form class="p-1" id="login" name="login" >
                            <div class="p-1" ><input class="form-control" type="text" name="username" id="username"  pattern="[a-zA-Z0-9]{3,20}"></div>
                            <div class="p-1" ><input class="form-control" type="password" name="password" id="password"  pattern="[a-zA-Z0-9]{3,20}"></div>
                            <div class="text-center">
                                <input class="btn btn-dark" id="submit" name="submit" type="submit" value=<?=$btnLog?>>
                            </div>
                        </form>
                    </ul>
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
                        <a href="https://cybertest.altervista.org/vineria/view/acquista.php" class=" ps-1 px-xxl-4 text-white " style="text-decoration: none;">ACQUISTA</a>
                        <?php
                            if($ruolo !== null && $stato !== null){
                                $labelUtente = $ruolo." ".$name;
                                echo '<a class=" text-white align-content-end align-items-end" style="text-decoration: none; float: right;">'.$labelUtente.'</a>';
                                //header("refresh:0");
                            }
                        ?>
                    </div>
            </div>
        </div>
        <!--ROW1video-->
        <div class="row  p-1 p-sm-1 ">
            <!--COL0 1200X680 BASE VIDEO-->
            <div class="px-5 col-sm-12 col-lg-12 col-md-12 col-xl-2 col-xs-12 col-xxl-3 rounded-1 " >
                <span ><p class="sizeFontCitazioni py-3 fontcitazioni" id="citazionesx" <?=$hiddenElementUser?>><?=$elementiArr[0]->getTesto();?></p>
                </span>
                <?php
                    if($ruolo !== 'user' && $logging === "loggato"){
                        echo '<span align="left"><textarea class = "textAreaStyle" wrap="virtual" maxlength="255" placeholder="max character 255" name="'.$elementiArr[0]->getId_elemento().'"id="text'.$elementiArr[0]->getId_elemento().'" cols="28" rows="10">'.$elementiArr[0]->getTesto().'</textarea>
                        <button class="btn" id="'.$elementiArr[0]->getId_elemento().'" name="'.$elementiArr[0]->getId_elemento().'">APPLY</button></span>';
                        //header("refresh:0");
                    }
                ?>
            </div>
            <div class="col-sm-12 col-lg-12 col-md-12 col-xl-8 col-xs-12 col-xxl-6 rounded-1" >
                <video  class=" rounded-4" width="100%" autoplay muted loop autobuffer preload="auto" playsinline style="object-fit: fill;" >
                    <source  src="<?=$elementiArr[1]->getFile_src();?>" type="video/mp4">
                    Il tuo browser non supporta il tag video.
                </video> 
                <?php
                    if($ruolo !== 'user' && $logging === "loggato"){
                        //echo var_dump($imgDir);
                    echo '<span class = "px-3"><select name="option'.$elementiArr[1]->getId_elemento().'" id="option'.$elementiArr[1]->getId_elemento().'">';
                        foreach($vidDir as $path){
                            //../media/img/wine-barrel.jpg
                            if($path === "." || $path === "..") continue;
                            $pathCompleta = trim("../media/video/".$path);
                            if($pathCompleta == trim($elementiArr[1]->getFile_src())){
                                $htmlOption = "<option value=".$pathCompleta." selected>".$path."</option>";
                            }else{
                                $htmlOption = "<option value=".$pathCompleta.">".$path."</option>";
                            }
                            echo $htmlOption;
                        }
                        echo '</span></select> 
                        <button class="btn righ d-flex-fill" id="'.$elementiArr[1]->getId_elemento().'" name="'.$elementiArr[1]->getId_elemento().'">APPLY</button>';
                        //header("refresh:0");
                    }
                    ?>
            </div>
            
            <div class="px-5 col-sm-12 col-lg-12 col-md-12 col-xl-2 col-xs-12 col-xxl-3 rounded-1 " >
                <span ><p class="sizeFontCitazioni py-3 fontcitazioni" id="citazionedx" <?=$hiddenElementUser?>><?=$elementiArr[2]->getTesto();?></p>
                </span>
                <?php
                    if($ruolo !== "user" && $logging === "loggato"){
                        echo '<textarea class = "textAreaStyle" wrap="virtual"  maxlength="255" placeholder="max character 255" name="'.$elementiArr[2]->getId_elemento().'" id="text'.$elementiArr[2]->getId_elemento().'" cols="28" rows="10">'.$elementiArr[2]->getTesto().'</textarea>
                        <button class="btn" id="'.$elementiArr[2]->getId_elemento().'" name="'.$elementiArr[2]->getId_elemento().'">APPLY</button>';
                        //header("refresh:0");
                    }
                ?>
            </div>
        </div>
        <div class="row  p-1 p-sm-1 ">
            <span><h2 class=" sizeFontSubTitleCenter fontbodyTitle" <?=$hiddenElementUser?>><?=$elementiArr[3]->getTesto();?></h2></span>
                <?php
                    if($ruolo !== 'user' && $logging === "loggato"){
                        echo '<textarea class = "textAreaStyle" wrap="virtual"  maxlength="25" placeholder="max title character 25" name="'.$elementiArr[3]->getId_elemento().'" id="text'.$elementiArr[3]->getId_elemento().'" cols="5" rows="1">'.$elementiArr[3]->getTesto().'</textarea>
                        <button class="btn" id="'.$elementiArr[3]->getId_elemento().'" name="'.$elementiArr[3]->getId_elemento().'">APPLY</button>';
                        //header("refresh:0");
                    }
                ?>        
            <span ><p class="sizeFontParagraf fontparagrafi" <?=$hiddenElementUser?>><?=$elementiArr[4]->getTesto();?></p>
                    </span>
                    <?php
                    if($ruolo !== 'user' && $logging === "loggato"){
                        echo '<textarea class = "textAreaStyle" wrap="virtual"  maxlength="1500" placeholder="max title character 25" name="'.$elementiArr[4]->getId_elemento().'" id="text'.$elementiArr[4]->getId_elemento().'" cols="30" rows="10">'.$elementiArr[4]->getTesto().'</textarea>
                        <button class="btn" id="'.$elementiArr[4]->getId_elemento().'" name="'.$elementiArr[4]->getId_elemento().'">APPLY</button>';
                        //header("refresh:0");
                    }
                ?>
        </div>
        <!--ROW1 CARD-->
        <div class="row p-1 p-sm-2 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1">
            <!--COL0-->
            <div class="col-sm-4 col-lg-12 col-md-12 col-xl-4 col-xs-3 col-xxl-4 rounded-1  " style=" height: fit-content;">
                <div class="card" style="width: 100%;">
                    <img src="<?=$elementiArr[5]->getFile_src();?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text sizeFontParagraf" <?=$hiddenElementUser?>><?=$elementiArr[5]->getTesto();?></p>
                            <?php
                                if($ruolo !== 'user' && $logging === "loggato"){
                                    //echo var_dump($imgDir);
                                    echo '<textarea class = "textAreaStyle " wrap="virtual"  maxlength="300" placeholder="max title character 25" name="'.$elementiArr[5]->getId_elemento().'" id="text'.$elementiArr[5]->getId_elemento().'" cols="30" rows="5">'.$elementiArr[5]->getTesto().'</textarea>
                                    <select name="option'.$elementiArr[5]->getId_elemento().'" id="option'.$elementiArr[5]->getId_elemento().'">';
                                    foreach($imgDir as $path){
                                        //../media/img/wine-barrel.jpg
                                        if($path === "." || $path === "..") continue;
                                        $pathCompleta = trim("../media/img/".$path);
                                        if($pathCompleta == trim($elementiArr[5]->getFile_src())){
                                            $htmlOption = "<option value=".$pathCompleta." selected>".$path."</option>";
                                        }else{
                                            $htmlOption = "<option value=".$pathCompleta.">".$path."</option>";
                                        }
                                        echo $htmlOption;
                                    }
                                    echo '</select> 
                                    <button class="btn righ d-flex-fill" id="'.$elementiArr[5]->getId_elemento().'" name="'.$elementiArr[5]->getId_elemento().'">APPLY</button>';
                                    //header("refresh:0");
                                }
                            ?>
                        </div>
                </div>    
            </div>
            <!--COL2-->
            <div class="col-sm-4 col-lg-12 col-md-12 col-xl-4 col-xs-3 col-xxl-4 rounded-1  "  style="object-fit: fill;">
                <div class="card" style="width: 100%; object-fit: fill;">
                    <img src="../media/img/brindisi_vino_bianco.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                        <p class="card-text sizeFontParagraf" <?=$hiddenElementUser?>><?=$elementiArr[6]->getTesto();?></p>
                            <?php
                                if($ruolo !== 'user' && $logging === "loggato"){
                                    //echo var_dump($imgDir);
                                    echo '<textarea class = "textAreaStyle " wrap="virtual"  maxlength="300" placeholder="max title character 25" name="'.$elementiArr[6]->getId_elemento().'" id="text'.$elementiArr[6]->getId_elemento().'" cols="30" rows="5">'.$elementiArr[6]->getTesto().'</textarea>
                                    <select name="option'.$elementiArr[6]->getId_elemento().'" id="option'.$elementiArr[6]->getId_elemento().'">';
                                    foreach($imgDir as $path){
                                        //../media/img/wine-barrel.jpg
                                        if($path === "." || $path === "..") continue;
                                        $pathCompleta = trim("../media/img/".$path);
                                        if($pathCompleta == trim($elementiArr[6]->getFile_src())){
                                            $htmlOption = "<option value=".$pathCompleta." selected>".$path."</option>";
                                        }else{
                                            $htmlOption = "<option value=".$pathCompleta.">".$path."</option>";
                                        }
                                        echo $htmlOption;
                                    }
                                    echo '</select> 
                                    <button class="btn righ d-flex-fill" id="'.$elementiArr[6]->getId_elemento().'" name="'.$elementiArr[6]->getId_elemento().'">APPLY</button>';
                                    //header("refresh:0");
                                }
                            ?>
                        </div>
                </div>
            </div>
            <!--COL1-->
            <div class="col-sm-4 col-lg-12 col-md-12 col-xl-4 col-xs-3 col-xxl-4 rounded-1 " > 
                <div class="card" style="width: 100%; height: fit-content;">
                    <img src="../media/img/nachos.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                        <p class="card-text sizeFontParagraf" <?=$hiddenElementUser?>><?=$elementiArr[7]->getTesto();?></p>
                        <?php
                            if($ruolo !== 'user' && $logging === "loggato"){
                                //echo var_dump($imgDir);
                                echo '<textarea class = "textAreaStyle " wrap="virtual"  maxlength="300" placeholder="max title character 25" name="'.$elementiArr[7]->getId_elemento().'" id="text'.$elementiArr[7]->getId_elemento().'" cols="30" rows="5">'.$elementiArr[7]->getTesto().'</textarea>
                                <select name="option'.$elementiArr[7]->getId_elemento().'" id="option'.$elementiArr[7]->getId_elemento().'">';
                                foreach($imgDir as $path){
                                    //../media/img/wine-barrel.jpg
                                    if($path === "." || $path === "..") continue;
                                    $pathCompleta = trim("../media/img/".$path);
                                    if($pathCompleta == trim($elementiArr[7]->getFile_src())){
                                        $htmlOption = "<option value=".$pathCompleta." selected>".$path."</option>";
                                    }else{
                                        $htmlOption = "<option value=".$pathCompleta.">".$path."</option>";
                                    }
                                    echo $htmlOption;
                                }
                                echo '</select> 
                                <button class="btn righ d-flex-fill" id="'.$elementiArr[7]->getId_elemento().'" name="'.$elementiArr[7]->getId_elemento().'">APPLY</button>';
                                //header("refresh:0");
                            }
                            ?>
                        </div>
                </div>
            </div>   
        </div>
        <!--ROW RECENSIONI-->
        <div id="recensioni" class="row p-1 p-sm-2 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1">
            <!--SEZIONE DEDICATA ALLE RECENSIONI DEI CLIENTI-->
            <div class="row  p-1 p-sm-1 ">
                <span><h2 class=" sizeFontSubTitleCenter fontbodyTitle ">COSA DICONO I NOSTRI AMICI CLIENTI</h2></span>
                <!--ROW1 CARD-->
                <!--costruzione delle recensioni da db-->
                <div id="contentRecensioni" class="row p-1 p-sm-2 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1">
                </div>
            </div>
        </div>
     <!--FOOTER-->
        <!--ROW0-->
        <div class="row p-3 p-sm-2 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1 header">
            <div class="row  p-1 p-sm-1 d-sm-flex d-lg-flex d-md-flex d-xl-flex d-xs-flex d-xxl-flex round-1">
                <div class=" col-12 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-xs-12 col-xxl-9 rounded-1 text-sm-center text-md-center text-xs-center text-xl-start text-xxl-start " >
                <a href="#recensioni" class=" px-1 px-xxl-4 text-white " style="text-decoration: none;">RECENSIONI</a>
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
<?php
    if(isset($_SESSION['loggato']) && $_SESSION['ruolo'] === 'admin'){
        echo '<script>
        $(document).ready(function() {
            $("button").click(function(){
                var name = $(this).attr("name"); //discrimina btn
                //alert(name);
                switch(name){
                    case "citazionesx":
                        var id_elemento = "text"+name;
                        //alert(id_elemento);
                        var testo = $("#"+id_elemento).val();
                        //alert(testo);
                        var id_element = '.json_encode($elementiArr[0]->getId_elemento()).';
                        //alert(id_element);
                        var file_src = "null";
                       // alert(file_src);
                        break;
                    case "citazionedx":
                        var id_elemento = "text"+name;
                        //alert(id_elemento);
                        var testo = $("#"+id_elemento).val();
                        //alert(testo);
                        var id_element = '.json_encode($elementiArr[2]->getId_elemento()).';
                        //alert(id_element);
                        var file_src = "null";
                        //alert(file_src);
                        break;
                    case "locale_title":
                        var id_elemento = "text"+name;
                        alert(id_elemento);
                        var testo = $("#"+id_elemento).val();
                        //alert(testo);
                        var id_element = '.json_encode($elementiArr[3]->getId_elemento()).';
                        //alert(id_element);
                        var file_src = "null";
                        //alert(file_src);
                        break;
                    case "locale_text":
                        var id_elemento = "text"+name;
                        alert(id_elemento);
                        var testo = $("#"+id_elemento).val();
                        //alert(testo);
                        var id_element = '.json_encode($elementiArr[4]->getId_elemento()).';
                        //alert(id_element);
                        var file_src = "null";
                        //alert(file_src);
                        break;
                    case "card_sx":
                        var id_elemento = "text"+name;
                        alert(id_elemento);
                        var testo = $("#"+id_elemento).val();
                        //alert(testo);
                        var id_element = '.json_encode($elementiArr[5]->getId_elemento()).';
                        //alert(id_element);
                        var optionFile = "option"+name;
                        var file_src = $("#"+optionFile).val();
                        alert(file_src);
                        break;
                    case "card_mid":
                        var id_elemento = "text"+name;
                        alert(id_elemento);
                        var testo = $("#"+id_elemento).val();
                        //alert(testo);
                        var id_element = '.json_encode($elementiArr[6]->getId_elemento()).';
                        //alert(id_element);
                        var optionFile = "option"+name;
                        var file_src = $("#"+optionFile).val();
                        alert(file_src);
                        break;
                    case "card_dx":
                        var id_elemento = "text"+name;
                        alert(id_elemento);
                        var testo = $("#"+id_elemento).val();
                        //alert(testo);
                        var id_element = '.json_encode($elementiArr[7]->getId_elemento()).';
                        //alert(id_element);
                        var optionFile = "option"+name;
                        var file_src = $("#"+optionFile).val();
                        alert(file_src);
                        break;
                }
                if(name === id_element && name != null){
                    $.post("../control/utils/elementihtml/gestioneelementi.php", {testo: testo, file_src: file_src, pageName: "home", id_element: id_element}, function(data){
                        if(data === "modificato"){
                            alert("Elemento modificato.");
                            location.reload(true);
                        }else if(data === "Errore"){
                            alert("Errore");        
                            location.reload(true);    
                        }
                    });
                }
            });
        });
        </script>';
    }
?> 
</body>
</html>
<?php
ob_end_flush();
?>