$(document).ready(function(){
$("#messageForm").submit(function(e) {

    e.preventDefault();
    
    var form = $(this);
    
    $.ajax({
        type: "POST",
        url: "../actions/sendMessageAction.php",
        data: form.serialize(), 
        success: function(data)
        {    
            if(data.includes('lastnameError'))
            {
                $("#lastnameErrorMSG").css("visibility", "visible");
            }
            else{
                $("#lastnameErrorMSG").css("visibility", "hidden"); 
            }
            if(data.includes('firstnameError'))
            {
                $("#firstnameErrorMSG").css("visibility", "visible");
            }
            else{
                $("#firstnameErrorMSG").css("visibility", "hidden"); 
            }
            if(data.includes('emailError'))
            {
                $("#emailErrorMSG").css("visibility", "visible");
            }
            else{
                $("#emailErrorMSG").css("visibility", "hidden"); 
            }
            if(data.includes('phoneError'))
            {
                $("#phoneErrorMSG").text('Ezt a mezőt kötelező kitölteni'); 
                $("#phoneErrorMSG").css("visibility", "visible");
            }
            else{
                if(data.includes('invalidPhoneError'))
                {
                    $("#phoneErrorMSG").text('Érvénytelen telefonszám'); 
                    $("#phoneErrorMSG").css("visibility", "visible");
                }
                else{
                    $("#phoneErrorMSG").css("visibility", "hidden"); 
                }
            }
            if(data.includes('messageError'))
            {
                $("#messageErrorMSG").css("visibility", "visible");
            }
            else{
                $("#messageErrorMSG").css("visibility", "hidden"); 
            }
            console.log(data);
        }
    });
    
});
});
    