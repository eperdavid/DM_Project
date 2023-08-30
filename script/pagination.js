$(".page-link").on('click', function() {
    
    var currentPage = $(".active").data("id");

    if(typeof currentPage === 'undefined')
    {
        currentPage = 1;
    }


    if($(this).data("id") == "next")
    {
        var id = currentPage + 1;
    }
    else if($(this).data("id") == "prev"){
        var id = currentPage - 1;
    }
    else{
        var id = $(this).data("id");
    }
    

    $(".active").removeClass("active");
    $("#"+id+"").addClass("active");

    $("#page"+currentPage+"").hide();
    $("#page"+id+"").css("display", "grid");

    if(id == 1)
    {
        $("#prev-btn").addClass("disabled");
    }
    else{
        $("#prev-btn").removeClass("disabled");
    }

    if(id == $("#largest").data("id"))
    {
        $("#next-btn").addClass("disabled");
    }
    else{
        $("#next-btn").removeClass("disabled");
    }

    
});
