function userBan(id){
    if(confirm("Tiltani fogja ezt a felhasználót!"))
    {
        $.ajax({
            url: '../actions/adminAction.php',
            type: 'post',
            data: {'id' : id, 'action' : 'ban'},
            success: function(data) {
                location.reload();
            }
        })
    }
}


function userDelete(id){
    if(confirm("Törölni fogja ezt a felhasználót!"))
    {
        $.ajax({
            url: '../actions/adminAction.php',
            type: 'post',
            data: {'id' : id, 'action' : 'delete'},
            success: function(data) {
                location.reload();
            }
        })
    }
}