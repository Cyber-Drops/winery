<?php
//struttura delle recensioni e load
namespace view;
ob_start();
session_start();
//$operatoriRecensioni = ['admin'];
$GLOBALS['operatoriRecensioniArr'] = ['admin'];
require_once '../control/utils/recensioni/loadrecensioni.php'; //includo il codice per 

foreach($recensioniArr as $Recensione){
    /*if($Recensione->getStato() === "revisionata"){*/
        if(isset($_SESSION['loggato']) && in_array($_SESSION['ruolo'], $GLOBALS['operatoriRecensioniArr'])){
            echo'<div class="col-sm-4 col-lg-12 col-md-12 col-xl-4 col-xs-3 col-xxl-2 rounded-1  " style=" height: fit-content;">
                <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Recensione di '.$Recensione->getNickname().'</h5>
                            <p class="card-text sizeFontParagraf">'.$Recensione->getMessaggio().'</p>';
                            if($Recensione->getStato() === "registrata"){
                               // echo '<input id="approva" name="approva" type="button" value="APPROVA">';
                               echo '<button id="approva" name="approva,'.$Recensione->getId().'">APPROVA</button>';
                            }
                                //echo '<input id="cancella" name="cancella" type="button" value="CANCELLA">
                                echo '<button id="cancella" name="cancella,'.$Recensione->getId().'">CANCELLA</button>
                        </div>
                </div>    
            </div>
        </div>';
        }else{
        echo'<div class="col-sm-4 col-lg-12 col-md-12 col-xl-4 col-xs-3 col-xxl-2 rounded-1  " style=" height: fit-content;">
                <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Recensione di '.$Recensione->getNickname().'</h5>
                            <p class="card-text sizeFontParagraf">'.$Recensione->getMessaggio().'</p>
                        </div>
                </div>    
            </div>
        </div>';
    }
    
}
echo '<script>
$(document).ready(function() {
    $("button").click(function(){
        var name = $(this).attr("name");
        var testId = $(this).attr("id");
        if(testId === "approva" || testId === "cancella"){    
            var nome = name.split(",")[0];
            var id = name.split(",")[1];
        if(nome == "approva" || nome == "cancella"){
            $.post("../control/utils/recensioni/gestionerecensione.php", {name: nome, id: id}, function(data){
                if(data === "approvata"){
                    alert("Recensione approvata.");
                    location.reload(true);
                }else if(data === "cancellata"){
                    alert("Recensione rimossa.");        
                    location.reload(true);    
                }
            });
        }
    }
    });
});
    </script>';
ob_end_flush();
?>