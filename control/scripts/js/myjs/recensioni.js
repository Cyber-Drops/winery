
$(document).ready(function() {
   $('#recensisci').submit(function(event){
        event.preventDefault();
        $.post("../../utils/recensioni/recensisci.php", $('recensisci').serialize(), function(data){
            if(data === "ok"){
                alert(data);
            }else{
                alert(data);            
            }
        });
   });
});