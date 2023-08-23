function formChange(){
    var rent_sell = $('input[name="rent-sell-option"]:checked').val();
    var type = $('#type').find(":selected").text();

    if(rent_sell == "Kiadó")
    {
        if(type == "Lakás")
        {   
            $('#rentHouse').hide();
            $('#rentPlot').hide();
            $('#sellApartment').hide();
            $('#sellHouse').hide();

            $('#rentApartment').show();
            $('#areaDiv').show();
        }
        if(type == "Ház")
        {
            $('#rentApartment').hide();
            $('#rentPlot').hide();
            $('#sellApartment').hide();
            $('#sellHouse').hide();

            $('#rentHouse').show();
            $('#areaDiv').show();
        }
        if(type == "Telek")
        {
            $('#rentHouse').hide();
            $('#rentApartment').hide();
            $('#areaDiv').hide();
            $('#sellApartment').hide();
            $('#sellHouse').hide();

            $('#rentPlot').show();
        }
    }
    else{
        if(type == "Lakás")
        {
            $('#rentApartment').hide();
            $('#rentHouse').hide();
            $('#rentPlot').hide();
            $('#sellHouse').hide();

            $('#sellApartment').show();
            $('#areaDiv').show();
        }
        if(type == "Ház")
        {
            $('#rentApartment').hide();
            $('#rentHouse').hide();
            $('#rentPlot').hide();
            $('#sellApartment').hide();

            $('#sellHouse').show();
            $('#areaDiv').show();
        }
        if(type == "Telek")
        {
            $('#rentHouse').hide();
            $('#rentApartment').hide();
            $('#areaDiv').hide();
            $('#sellApartment').hide();
            $('#sellHouse').hide();

            $('#rentPlot').show();
        }
    }
}