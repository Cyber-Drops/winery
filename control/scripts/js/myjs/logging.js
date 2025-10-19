$(document).ready(function() {
    $("#login").submit(function(event) {
        event.preventDefault();
        if($("#submit").val() == "ACCEDI") {
        $.post("../control/utils/logging.php",$("#login").serialize(), function(data) {
            alert(data);
            if(data == true){
                location.reload(true);
            }
        });
        }else{
            $.post("../control/utils/logout.php");
            alert("LOGOUT ESEGUITO ByeBye"); 
            window.location.reload(true);
        }

    });


//action="../control/utils/logging.php" method="post"
});