
// this is the id of the form
$("#form1").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.

var form = $(this);

$.ajax({
    type: "POST",
    url: "../actions/insertAction.php",
    data: form.serialize(), // serializes the form's elements.
    success: function(data)
    {
        if(data.includes("phoneError"))
        {
            $("#phoneErrorMSG").text("Érvénytelen telefonszám");
        }
        else{
            if(data.includes("existphError"))
            {
                $("#phoneErrorMSG").text("Ez a telefonszám már foglalt!");
            }
            else{
                $("#phoneErrorMSG").text("");
            }
        }

        if(data.includes("none"))
        {
            $(".firstForm").hide();
            $(".secondForm").show();

            $("#progress2").css("background-color", "#286DF3");
            $("#progress2").css("color", "white");
            $("#progress2Icon").css("background-color", "#286DF3");
            $("#progress2Label").css("color", "#286DF3");
            
        }
        
        console.log(data);
    }
});

});









// this is the id of the form
$("#form2").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.

var form = $(this);

$.ajax({
type: "POST",
url: "../actions/insertAction.php",
data: form.serialize(), // serializes the form's elements.
success: function(data)
{
    if(data.includes("streetError"))
    {
        $("#streetErrorMSG").text("Ezt a mezőt kötelező kitölteni!");
    }
    else{
        $("#streetErrorMSG").text("");
    }
    if(data.includes("housenumberError"))
    {
        $("#houseNumberErrorMSG").text("Ezt a mezőt kötelező kitölteni!");
    }
    else{
        $("#houseNumberErrorMSG").text("");
    }
    if(data.includes("areaError"))
    {
        $("#areaErrorMSG").text("Ezt a mezőt kötelező kitölteni!");
    }
    else{
        $("#areaErrorMSG").text("");
    }
    if(data.includes("roomsError"))
    {
        $("#roomsErrorMSG").text("Ezt a mezőt kötelező kitölteni!");
    }
    else{
        $("#roomsErrorMSG").text("");
    }
    if(data.includes("halfroomError"))
    {
        $("#halfroomsErrorMSG").text("Nem lehet negatív szám!");
    }
    else{
        $("#halfroomsErrorMSG").text("");
    }
    if(data.includes("levelError"))
    {
        $("#levelErrorMSG").text("Ezt a mezőt kötelező kitölteni!");
    }
    else{
        if(data.includes("levelBiggerError"))
        {
            $("#levelErrorMSG").text("Nem lehet nagyobb mint az épület szintje!");
        }
        else{
            $("#levelErrorMSG").text("");
        }    
    }
    if(data.includes("maxLevelError"))
    {
        $("#maxLevelErrorMSG").text("Ezt a mezőt kötelező kitölteni!");
    }
    else{
        $("#maxLevelErrorMSG").text("");
    }
    if(data.includes("rentalPeriodError"))
    {
        $("#rentalPeriodErrorMSG").text("Ezt a mezőt kötelező kitölteni!");
    }
    else{
        $("#rentalPeriodErrorMSG").text("");
    }
    if(data.includes("overheadError"))
    {
        $("#overheadErrorMSG").text("Ezt a mezőt kötelező kitölteni!");
    }
    else{
        $("#overheadErrorMSG").text("");
    }
    if(data.includes("commonError"))
    {
        $("#commonErrorMSG").text("Ezt a mezőt kötelező kitölteni!");
    }
    else{
        $("#commonErrorMSG").text("");
    }
    if(data.includes("priceError"))
    {
        $("#priceErrorMSG").text("Ezt a mezőt kötelező kitölteni!");
    }
    else{
        $("#priceErrorMSG").text("");
    }
    if(data.includes("descriptionError"))
    {
        $("#descriptionErrorMSG").text("Ezt a mezőt kötelező kitölteni!");
    }
    else{
        $("#descriptionErrorMSG").text("");
    }


    if(data.includes("none"))
    {
        $(".secondForm").hide();
        $(".thirdForm").show();

        $("#progress3").css("background-color", "#286DF3");
        $("#progress3").css("color", "white");
        $("#progress3Icon").css("background-color", "#286DF3");
        $("#progress3Label").css("color", "#286DF3");
    }
    console.log(data);
}
});

});





















// this is the id of the form
$("#form3").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.

var form = $(this)[0];
var formData = new FormData(form);

$.ajax({
type: "POST",
url: "../actions/insertAction.php",
enctype: "multipart/form-data",
processData: false,
contentType: false,
data: formData, // serializes the form's elements.
success: function(data)
{
    if(data.includes("insertError"))
    {
        $("#insertErrorMsg").text("Valami hiba történt");
    }
    else{
        $("#insertErrorMsg").text("");
    }
    if(data.includes("max10mb"))
    {
        $("#imageErrorMsg").text("Max 10 MB");
    }
    else{
        if(data.includes("badFormat"))
        {
            $("#imageErrorMsg").text("Nem jó kép formátum");
        }
        else{
            $("#insertErrorMsg").text("");
        }
    }


    if(data.includes("ok"))
    {
       window.location.href = "../pages/index.php";
    }
    console.log(data);
}
});

});
