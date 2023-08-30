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
    }

    if(type== "Ház")
    {
            $("#area").show();
            $("#roomsDiv").show();
            $("#plotArea").show();
            $("#propertyLevel").hide();
            $("#elevator").hide();
            $("#formPlotArea").hide();

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
    }

    if(type == "Telek")
    {
        $("#formPlotArea").show();
        $("#PlotArea").show();


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

    }


    if(rent_sell == "Kiadó")
    {
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
