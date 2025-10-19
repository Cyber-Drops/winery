
$(document).ready(function() {//Salva Recensione su db
   $('#recensisci').submit(function(event){
        event.preventDefault();
        $.post("../control/utils/recensioni/recensisci.php", $('#recensisci').serialize(), function(data){
            //alert(data);
            if(data === "ok"){
                alert("Recensione inviata correttamente, in attesa di moderazione.");
            }else{
                //alert(data);            
            }
        });

   });
   //carica le recenzioni sulla homePage
    $('#contentRecensioni').load('./recensioni.php');   
    
});

