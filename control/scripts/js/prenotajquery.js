
    $(document).ready(function () {
        var dateArr = ['13-5-2023'];    //date prenotazioni, vanno recuperate dal db
        $("#datepickerpartenza").datepicker({
            beforeShowDay: function(date){
                var y = date.getFullYear().toString(); // get full year
                var m = (date.getMonth() + 1).toString(); // get month.
                var d = date.getDate().toString(); // get Day 
                var dataOccupata  = d+'-'+m+'-'+y;
                if(jQuery.inArray(dataOccupata, dateArr) != -1){ 
                    return [true, "highlight", "data occupata"];
                }
            
                return [true, "date-bg"];
            }
        });

        var dateArrRitorno = ['15-5-2023'];    //date prenotazioni, vanno recuperate dal db
        $("#datepickerritorno").datepicker({
            beforeShowDay: function(date){
                var y = date.getFullYear().toString(); // get full year
                var m = (date.getMonth() + 1).toString(); // get month.
                var d = date.getDate().toString(); // get Day
                var dataOccupata  = d+'-'+m+'-'+y;
                if(jQuery.inArray(dataOccupata, dateArrRitorno) != -1){ 
                    return [true, "highlight", "data occupata"];
                }
                return [true, "date-bg"];
            }
        });
     
        $('#datiPrenotazione').submit(function(event){
            event.preventDefault(); //invalido l'evento submit di default e lo gestisco 
            var dataPartenza = $('#datepickerpartenza').val();// penultimo dato nell'array datiPrenotazione
            var dataRitorno = $('#datepickerritorno').val();//  ultimo dato nell'array datiPrenotazione
            try{
                if(chekDateSelected(dataPartenza, dataRitorno)){
                    var datiPrenotazione = $('#datiPrenotazione').serializeArray();
                    var json_payload = {};
                    for(var i = 0; i < datiPrenotazione.length; i++) {
                        json_payload[datiPrenotazione[i]['name']] = datiPrenotazione[i]['value'];
                    }
                    json_payload['dataPartenza'] = dataPartenza;
                    json_payload['dataRitorno'] = dataRitorno;
                    console.log(json_payload);
                    $.post('../control/utils/registraprenotazione.php', JSON.stringify(json_payload), function(data){
                        if(data === "ok"){
                            alert("PRENOTATO");
                        }else{
                            alert(data);
                        }
                    })
                }
            }catch{
                alert("data selezionata non valida!");
            }
        });
    });

    function configPiker(){
        $( "#datepickerpartenza" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
        //$( "#datepickerpartenza" ).datepicker( "option", "autoSize", "true" );
        //$( "#datepickerpartenza" ).datepicker( "option", "dayNames", [ "Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi" ] );
        $( "#datepickerpartenza" ).datepicker( "option", "constrainInput", true );
        $( "#datepickerpartenza" ).datepicker( "option", "showOptions",  "up" );
        //$( "#datepickerpartenza" ).datepicker( destroy );

        $( "#datepickerritorno" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
        //$( "#datepickerritorno" ).datepicker( "option", "autoSize", "true" );
        $( "#datepickerritorno" ).datepicker( "option", "constrainInput", true );
        $( "#datepickerritorno" ).datepicker( "option", "showOptions", { direction: "down" } );
       // $( "#datepickerritorno" ).datepicker( destroy );
        //$( "#datepickerritorno" ).datepicker( "option", "dayNames", [ "Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi" ] );
    
        $( "#datepickerpartenza"  ).datepicker( "refresh" );
        $( "#datepickerritorno"  ).datepicker( "refresh" );
    }
        function chekDateSelected(dateStartString, dateEndString) {
        var dateStartArr =dateStartString.split("/");
        var dateEndArr = dateEndString.split("/");
        //eseguire controllo anche sul giorno e l'anno, non devono essere nell'array delle prenotazioni del db
        if(parseInt(dateStartArr[0]) <= parseInt(dateEndArr[0]) && parseInt(dateStartArr[1]) <= parseInt(dateEndArr[1]) && parseInt(dateStartArr[2]) <= parseInt(dateEndArr[2])){
            console.log(dateStartArr);
            console.log(dateEndArr);
            return true;
        }else{
            throw new Error("Something went badly wrong!");
        }
    }

