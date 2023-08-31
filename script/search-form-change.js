function searchChange() {
        
    var rent_sell = $('input[name="rent-sell-option"]:checked').val();
    var type = $('#type').find(":selected").text();

    if(type == "Lakás")
    {
            $("#area").show();
            $("#roomsDiv").show();
            $("#plotArea").hide();
            $("#propertyLevel").show();
            $("#elevator").show();
            $("#formPlotArea").hide();
            $("#gas").hide();
            $("#canal").hide();
            $("#electricity").hide();
            $("#coverage").hide();
            $("#water").hide();
            
            $("#maxLevel").hide();
            $("#cellar").hide();
            $("#area2").show();

            $("#roomDiv2").show();
            $("#furnished").show();
            $("#condition").show();
            $("#heating").show();
            $("#comfort").show();
            $("#height").show();
            $("#airconditioner").show();
            $("#barrier").show();
            $("#wc").show();
            $("#overhead").show();

            $("#form2").attr("action", "properties.php");
    }

    if(type== "Ház")
    {
            $("#area").show();
            $("#roomsDiv").show();
            $("#plotArea").show();
            $("#propertyLevel").hide();
            $("#elevator").hide();
            $("#formPlotArea").hide();
            $("#gas").hide();
            $("#canal").hide();
            $("#electricity").hide();
            $("#coverage").hide();
            $("#water").hide();

            $("#maxLevel").show();
            $("#cellar").show();
            $("#area2").show();

            $("#roomDiv2").show();
            $("#furnished").show();
            $("#condition").show();
            $("#heating").show();
            $("#comfort").show();
            $("#height").show();
            $("#airconditioner").show();
            $("#barrier").show();
            $("#wc").show();
            $("#overhead").show();

            $("#form2").attr("action", "properties.php");
    }

    if(type == "Telek")
    {
        $("#formPlotArea").show();
        $("#plotArea").show();
        $("#water").show();
        $("#gas").show();
        $("#canal").show();
        $("#electricity").show();
        $("#coverage").show();


        $("#area2").hide();
        $("#area").hide();
        $("#roomsDiv").hide();


        $("#roomDiv2").hide();
        $("#furnished").hide();
        $("#condition").hide();
        $("#heating").hide();
        $("#comfort").hide();
        $("#height").hide();
        $("#propertyLevel").hide();
        $("#elevator").hide();
        $("#maxLevel").hide();
        $("#cellar").hide();
        $("#airconditioner").hide();
        $("#insulation").hide();
        $("#smoking").hide();
        $("#animal").hide();
        $("#barrier").hide();
        $("#wc").hide();
        $("#overhead").hide();


        $("#form2").attr("action", "plots.php");
    }
    

    if(rent_sell == "Kiadó")
    {
        $("#sellBtn").removeClass("rent-sell-active");
        $("#sellBtn2").removeClass("rent-sell-active");

        $("#rentBtn").addClass("rent-sell-active");
        $("#rentBtn2").addClass("rent-sell-active");

        if(type == "Lakás")
        {
            $("#smoking").show();
            $("#animal").show();

            $("#insulation").hide();
        }
        if(type == "Ház")
        {
            $("#smoking").show();
            $("#animal").show();

            $("#insulation").hide();
        }
    }
    else if(rent_sell == "Eladó")
    {
        $("#rentBtn").removeClass("rent-sell-active");
        $("#rentBtn2").removeClass("rent-sell-active");

        $("#sellBtn").addClass("rent-sell-active");
        $("#sellBtn2").addClass("rent-sell-active");

        if(type == "Lakás")
        {
            $("#smoking").hide();
            $("#animal").hide();

            $("#insulation").show();
        }
        if(type == "Ház")
        {
            $("#smoking").hide();
            $("#animal").hide();

            $("#insulation").show();
        }
    }
    
}

$('#city').change(function() {
    var selectedValue = $(this).val();
    if ($('#city2').val() !== selectedValue) {
        $('#city2').val(selectedValue).trigger('change');
    }
});

$('#city2').change(function() {
    var selectedValue = $(this).val();
    if ($('#city').val() !== selectedValue) {
        $('#city').val(selectedValue).trigger('change');
    }
});

$('#type').change(function() {
    var selectedValue = $(this).val();
    if ($('#type2').val() !== selectedValue) {
        $('#type2').val(selectedValue).trigger('change');
    }
});

$('#type2').change(function() {
    var selectedValue = $(this).val();
    if ($('#type').val() !== selectedValue) {
        $('#type').val(selectedValue).trigger('change');
    }
});

$('#room').change(function() {
    var selectedValue = $(this).val();
    if ($('#room2').val() !== selectedValue) {
        $('#room2').val(selectedValue).trigger('change');
    }
});

$('#room2').change(function() {
    var selectedValue = $(this).val();
    if ($('#room').val() !== selectedValue) {
        $('#room').val(selectedValue).trigger('change');
    }
});

$('#pricemin').keyup(function (){
    $('#pricemin2').val($(this).val());
});
$('#pricemin2').keyup(function (){
    $('#pricemin').val($(this).val());
});

$('#pricemax').keyup(function (){
    $('#pricemax2').val($(this).val());
});
$('#pricemax2').keyup(function (){
    $('#pricemax').val($(this).val());
});

$('#areamin').keyup(function (){
    $('#areamin2').val($(this).val());
});
$('#areamin2').keyup(function (){
    $('#areamin').val($(this).val());
});

$('#areamax').keyup(function (){
    $('#areamax2').val($(this).val());
});
$('#areamax2').keyup(function (){
    $('#areamax').val($(this).val());
});


$('#plotareamin').keyup(function (){
    $('#plotareamin2').val($(this).val());
});
$('#plotareamin2').keyup(function (){
    $('#plotareamin').val($(this).val());
});

$('#plotareamax').keyup(function (){
    $('#plotareamax2').val($(this).val());
});
$('#plotareamax2').keyup(function (){
    $('#plotareamax').val($(this).val());
});

