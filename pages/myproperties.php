<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/myPropertiesStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <div class="userData">
            <form id="userDataForm">
            <h3>Saját adataim</h3>
            <p>*minden hirdetésednél ezek az adatok jelennek meg</p>
            <div class="inputsFlex">
                <div class="inputs">
                    <div>
                        <label>Vezetéknév</label>
                        <input type="name" name="lastname" value="<?php if(isset($_SESSION['lastname'])) { echo $_SESSION['lastname']; } ?>">
                        <span class="errorMSG" id="lastnameErrorMsg">Ezt a mezőt kötelező kitölteni!</span>
                    </div>
                    <div>
                        <label>Keresztnév</label>
                        <input type="name" name="firstname" value="<?php if(isset($_SESSION['firstname'])) { echo $_SESSION['firstname']; } ?>">
                        <span class="errorMSG" id="firstnameErrorMsg">Ezt a mezőt kötelező kitölteni!</span>
                    </div>
                </div>
                <div class="inputs">
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" value="<?php if(isset($_SESSION['email'])) { echo $_SESSION['email']; } ?>">
                        <span class="errorMSG" id="mailErrorMsg">Ezt a mezőt kötelező kitölteni!</span>
                    </div>
                    <div>
                        <label>Telefonszám</label>
                        <input type="number" name="phone" value="<?php if(isset($_SESSION['phone'])) { echo $_SESSION['phone']; } ?>">
                        
                    </div>
                </div>
                <div class="inputs">
                    <div>
                        <label>Új jelszó</label>
                        <input type="password" name="password">
                        <span class="errorMSG" id="pswErrorMsg">Minimum 6 karakter</span>
                    </div>
                    <div>
                        <label>Jelszó újra</label>
                        <input type="password" name="passwordAgain">
                        <span class="errorMSG" id="passwordNotMatchErrorMsg">A két jelszó nem egyezik</span>
                    </div>
                </div>
            </div>
            <button>Mentés</button>
            </form>
        </div>
        <div class="wrapper">
            <h3>Hirdetéseim</h3>
            <p>Jelenleg 4 aktív hirdetésed van</p>
        <div class="cards">
            <div class="card">
                <img src="../img/szabadka.jpg" alt="Avatar" style="width:100%">
                <div class="card-icons">
                    <div><a href="#"><i class="fa-solid fa-pen-to-square"></i></a></div>
                    <div><i class="fa-solid fa-trash-can"></i></div>
                </div>
                <div class="container">
                <h4><b>24,000 USD</b></h4> 
                <p>12. Váci utca, Budapest</p> 
                </div>
                <div class="info">
                    <div>
                        <div class="icon">
                            <i class="fa-solid fa-vector-square"></i>
                            <span><b>360m<sup>2</sup></b></span>
                        </div>
                        <p>Alapterület</p>
                    </div>
                    <div>
                        <div class="icon">
                            <i class="fa-solid fa-door-open"></i>
                            <span><b>3</b></span>
                        </div>
                        <p>Szobák</p>
                    </div>
                    <div>
                        <div class="icon">
                            <i class="fa-solid fa-building"></i>
                            <span><b>1.</b></span>
                        </div>
                        <p>Emelet</p>
                    </div>
                </div>
            </div>
        
            <div class="card">
                <img src="../img/szabadka.jpg" alt="Avatar" style="width:100%">
                <div class="container">
                <h4><b>24,000 USD</b></h4> 
                <p>12. Váci utca, Budapest</p> 
                </div>
                <div class="info">
                    <div>
                        <div class="icon">
                            <i class="fa-solid fa-vector-square"></i>
                            <span><b>360m<sup>2</sup></b></span>
                        </div>
                        <p>Alapterület</p>
                    </div>
                    <div>
                        <div class="icon">
                            <i class="fa-solid fa-door-open"></i>
                            <span><b>3+1 fél</b></span>
                        </div>
                        <p>Szobák</p>
                    </div>
                    <div>
                        <div class="icon">
                            <i class="fa-solid fa-maximize"></i>
                            <span><b>1107m<sup>2</sup></b></span>
                        </div>
                        <p>Telekterület</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="../img/szabadka.jpg" alt="Avatar" style="width:100%">
                <div class="container">
                <h4><b>24,000 USD</b></h4> 
                <p>12. Váci utca, Budapest</p> 
                </div>
                <div class="info">
                    <div>
                        <div class="icon">
                            <i class="fa-solid fa-vector-square"></i>
                            <span><b>360m<sup>2</sup></b></span>
                        </div>
                        <p>Alapterület</p>
                    </div>
                    <div>
                        <div class="icon">
                            <i class="fa-solid fa-door-open"></i>
                            <span><b>3</b></span>
                        </div>
                        <p>Szobák</p>
                    </div>
                    <div>
                        <div class="icon">
                            <i class="fa-solid fa-building"></i>
                            <span><b>1.</b></span>
                        </div>
                        <p>Emelet</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <img src="../img/szabadka.jpg" alt="Avatar" style="width:100%">
                <div class="container">
                <h4><b>24,000 USD</b></h4> 
                <p>12. Váci utca, Budapest</p> 
                </div>
                <div class="info">
                    <div>
                        <div class="icon">
                            <i class="fa-solid fa-vector-square"></i>
                            <span><b>360m<sup>2</sup></b></span>
                        </div>
                        <p>Alapterület</p>
                    </div>
                    <div>
                        <div class="icon">
                            <i class="fa-solid fa-door-open"></i>
                            <span><b>3</b></span>
                        </div>
                        <p>Szobák</p>
                    </div>
                    <div>
                        <div class="icon">
                            <i class="fa-solid fa-building"></i>
                            <span><b>1.</b></span>
                        </div>
                        <p>Emelet</p>
                    </div>
                </div>
            </div>




        </div>
    </div>
    </main>



    <script>
        // this is the id of the form
$("#userDataForm").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.

var form = $(this);

$.ajax({
    type: "POST",
    url: "../actions/userDataAction.php",
    data: form.serialize(), // serializes the form's elements.
    success: function(data)
    {   
        if(data.includes("lastnameError"))
        {
            $("#lastnameErrorMsg").css("visibility", "visible");
        }
        else{
            $("#lastnameErrorMsg").css("visibility", "hidden");
        }
        if(data.includes("firstnameError"))
        {
            $("#firstnameErrorMsg").css("visibility", "visible");
        }
        else{
            $("#firstnameErrorMsg").css("visibility", "hidden");
        }
        if(data.includes("emailError"))
        {
            $("#mailErrorMsg").css("visibility", "visible");
        }
        else{
            $("#mailErrorMsg").css("visibility", "hidden");
        }
        if(data.includes("passwordError"))
        {
            $("#pswErrorMsg").css("visibility", "visible");
        }
        else{
            $("#pswErrorMsg").css("visibility", "hidden");
        }
        if(data.includes("passwordNotMatch"))
        {
            $("#passwordNotMatchErrorMsg").css("visibility", "visible");
        }
        else{
            $("#passwordNotMatchErrorMsg").css("visibility", "hidden");
        }

        console.log(data);
    }
});

});
    </script>
</body>
</html>