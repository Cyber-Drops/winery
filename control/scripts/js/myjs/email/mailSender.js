$(document).ready(function() {
    $('#sendMail').submit(function(event) {
        event.preventDefault();
        $.post('../control/utils/email/info_mail_sender.php',$('#sendMail').serialize(), function(data) {
            if (data === "ok"){
                alert("Email sent successfullyy, funzione inibita ma testata");
            }else{
                //alert(data);
                alert("Email failed");
            }
        });
    });

});