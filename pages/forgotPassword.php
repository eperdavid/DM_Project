<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/forgotPasswordStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=""></link>
    <title>Document</title>
</head>
<body>
    <?php include 'nav.php'; ?>
<div class="formDiv">

<?php
if(!empty($_GET['token']))
{
    include '../actions/db_config.php';

    $sql = 'SELECT * FROM users WHERE passwordToken = "'.$_GET['token'].'"';
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            echo '
            <form id="form2">
                    <div id="formDiv">
                    <h5>Új jelszó beállítása</h5>
                    <p>Add meg az e-mail-címedet és elküldünk neked egy hivatkozást, amellyel visszajuthatsz a fiókodba.</p>
                    <div>
                        <input type="hidden" name="passwordToken" value="'.$_GET['token'].'">
                        <div class="form-outline mb-1">
                            <input type="password" name="password" class="form-control" />
                            <label class="form-label">Jelszó</label>
                        </div>
                        <span class="ErrorMSG" id="passwordMsg">Ezt a mezőt kötelező kitölteni!</span>
                    </div>
                    <div>
                        <div class="form-outline mb-1">
                            <input type="password" name="passwordagain" class="form-control" />
                            <label class="form-label">Jelszó újra</label>
                        </div>
                        <span class="ErrorMSG" id="againpassMsg">Nem egyeznek a jelszavak</span>
                    </div>
            
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Mentés</button>
                    </div>
                    <div class="success" id="successMsg">
                        <p>Új jelszó sikeressen beállítva</p>
                        <a href="index.php">Vissza a kezdőoldalra</a>
                    </div>
                </form>';
        }
    }
    else{
        echo 'indexre';
    }
}
else{
echo '
<form id="form1">
        <div id="formDiv">
        <h5>Elfelejtett jelszó</h5>
        <p>Add meg az e-mail-címedet és elküldünk neked egy hivatkozást, amellyel visszajuthatsz a fiókodba.</p>
        <!-- Name input -->
        <div>
            <div class="form-outline mb-1">
                <input type="text" name="email" class="form-control" />
                <label class="form-label">Email</label>
            </div>
            <span class="ErrorMSG" id="emailMsg">Ezt a mezőt kötelező kitölteni!</span>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4" id="sendForgotPassword">Küldés</button>
        </div>
        <div class="success" id="successMsg">
            <p>A megadott email címre elkültük e jelszóvisszaállításhoz szükséges hivatkozást</p>
        </div>
    </form>';
}

?>
    
</div>
    <script>
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
        new mdb.Input(formOutline).init();
        });
    </script>

    <script>
    $("#form1").submit(function(e) {
    
            e.preventDefault();
            
            var form = $(this);
            
            $.ajax({
            type: "POST",
            url: "../actions/forgotPasswordAction.php",
            data: form.serialize(), 
            beforeSend: function() {
                $("#sendForgotPassword").prop('disabled', true);
            },
            success: function(data)
            {
                if(data.includes("emptyEmail"))
                {
                    $("#emailMsg").text("Ezt a mezőt kötelező kitölteni!"); 
                    $("#emailMsg").css("visibility", "visible");
                }
                else{
                    if(data.includes("NoUser"))
                    {
                        $("#emailMsg").text("Nem található ilyen felhasználó"); 
                        $("#emailMsg").css("visibility", "visible"); 
                    }
                    else{
                        $("#emailMsg").css("visibility", "hidden"); 
                    }
                    
                }
                $("#sendForgotPassword").prop('disabled', false);
                if(data.includes("ok"))
                {
                    $("#formDiv").hide();
                    $("#successMsg").show();
                }
                
                console.log(data);
            }
        })
    })

    $("#form2").submit(function(e) {
    
            e.preventDefault();
            
            var form = $(this);
            
            $.ajax({
            type: "POST",
            url: "../actions/newPasswordAction.php",
            data: form.serialize(), 
            success: function(data)
            {
                if(data.includes("passError"))
                {
                    $("#passwordMsg").text("Ezt a mezőt kötelező kitölteni");
                    $("#passwordMsg").css("visibility", "visible");
                }
                else{
                    if(data.includes("shortPass"))
                    {
                        $("#passwordMsg").text("Legalább 6 karakter");
                        $("#passwordMsg").css("visibility", "visible");
                    }
                    else{
                        $("#passwordMsg").css("visibility", "hidden");
                    }
                }

                if(data.includes("notMatchPass"))
                {
                    $("#againpassMsg").css("visibility", "visible");
                }
                else{
                    $("#againpassMsg").css("visibility", "hidden");
                }

                if(data.includes("ok"))
                {
                    $("#formDiv").hide();
                    $("#successMsg").show();
                }

                console.log(data);
            }
        })
    })
    </script>
</body>
</html>